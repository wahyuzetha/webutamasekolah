<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Post;
use App\Models\Major;
use App\Models\Extracurricular;
use App\Models\Feature;
use App\Models\Slider;
use App\Models\Teacher;
use App\Models\ExtracurricularGallery;
use App\Models\Setting;

class AutoTranslateContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translate:content';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically translate existing content to English where missing using free Google API.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting content translation...');

        // Helper function to safely translate using free API
        $translate = function ($text) {
            $text = trim($text);
            if (empty($text)) return $text;
            
            try {
                $response = Http::get('https://translate.googleapis.com/translate_a/single', [
                    'client' => 'gtx',
                    'sl' => 'id',
                    'tl' => 'en',
                    'dt' => 't',
                    'q' => $text
                ]);
                
                if ($response->successful()) {
                    $json = $response->json();
                    $translatedText = '';
                    if (isset($json[0]) && is_array($json[0])) {
                        foreach ($json[0] as $part) {
                            $translatedText .= $part[0];
                        }
                    }
                    return $translatedText ?: $text;
                }
            } catch (\Exception $e) {
                $this->error('Translation error: ' . $e->getMessage());
            }
            return $text;
        };

        // 1. Posts
        $this->info('Translating Posts...');
        $posts = Post::all();
        foreach ($posts as $post) {
            $updated = false;
            if (empty($post->title_en) && !empty($post->title)) {
                $post->title_en = $translate($post->title);
                $updated = true;
            }
            if (empty($post->content_en) && !empty($post->content)) {
                // Remove HTML tags for translation to avoid breaking them, or translate raw.
                // Usually Google Translate handles basic HTML well.
                $post->content_en = $translate($post->content);
                $updated = true;
            }
            if ($updated) {
                $post->save();
                $this->line('Translated post: ' . $post->title);
            }
        }

        // 2. Majors
        $this->info('Translating Majors...');
        $majors = Major::all();
        foreach ($majors as $major) {
            $updated = false;
            if (empty($major->name_en) && !empty($major->name)) {
                $major->name_en = $translate($major->name);
                $updated = true;
            }
            if (empty($major->description_en) && !empty($major->description)) {
                $major->description_en = $translate($major->description);
                $updated = true;
            }
            if ($updated) {
                $major->save();
                $this->line('Translated major: ' . $major->name);
            }
        }

        // 3. Extracurriculars
        $this->info('Translating Extracurriculars...');
        $extracurriculars = Extracurricular::all();
        foreach ($extracurriculars as $extracurricular) {
            $updated = false;
            if (empty($extracurricular->name_en) && !empty($extracurricular->name)) {
                $extracurricular->name_en = $translate($extracurricular->name);
                $updated = true;
            }
            if (empty($extracurricular->description_en) && !empty($extracurricular->description)) {
                $extracurricular->description_en = $translate($extracurricular->description);
                $updated = true;
            }
            if ($updated) {
                $extracurricular->save();
                $this->line('Translated extracurricular: ' . $extracurricular->name);
            }
        }

        // 4. Features
        $this->info('Translating Features...');
        $features = Feature::all();
        foreach ($features as $feature) {
            $updated = false;
            if (empty($feature->title_en) && !empty($feature->title)) {
                $feature->title_en = $translate($feature->title);
                $updated = true;
            }
            if (empty($feature->description_en) && !empty($feature->description)) {
                $feature->description_en = $translate($feature->description);
                $updated = true;
            }
            if ($updated) {
                $feature->save();
                $this->line('Translated feature: ' . $feature->title);
            }
        }

        // 5. Sliders
        $this->info('Translating Sliders...');
        $sliders = Slider::all();
        foreach ($sliders as $slider) {
            $updated = false;
            if (empty($slider->title_en) && !empty($slider->title)) {
                $slider->title_en = $translate($slider->title);
                $updated = true;
            }
            if (empty($slider->subtitle_en) && !empty($slider->subtitle)) {
                $slider->subtitle_en = $translate($slider->subtitle);
                $updated = true;
            }
            if ($updated) {
                $slider->save();
                $this->line('Translated slider: ' . $slider->title);
            }
        }

        // 6. Teachers
        $this->info('Translating Teachers...');
        $teachers = Teacher::all();
        foreach ($teachers as $teacher) {
            $updated = false;
            if (empty($teacher->position_en) && !empty($teacher->position)) {
                $teacher->position_en = $translate($teacher->position);
                $updated = true;
            }
            if ($updated) {
                $teacher->save();
                $this->line('Translated teacher: ' . $teacher->name);
            }
        }

        // 7. ExtracurricularGalleries
        $this->info('Translating Extracurricular Galleries...');
        $galleries = ExtracurricularGallery::all();
        foreach ($galleries as $gallery) {
            $updated = false;
            if (empty($gallery->caption_en) && !empty($gallery->caption)) {
                $gallery->caption_en = $translate($gallery->caption);
                $updated = true;
            }
            if ($updated) {
                $gallery->save();
                $this->line('Translated gallery caption');
            }
        }

        // 8. Settings
        $this->info('Translating Settings...');
        $settingKeys = [
            'about_title' => 'about_title_en',
            'about_description' => 'about_description_en',
            'visi_sekolah' => 'visi_sekolah_en',
            'misi_sekolah' => 'misi_sekolah_en',
            'school_address' => 'school_address_en'
        ];

        foreach ($settingKeys as $idKey => $enKey) {
            $idSetting = Setting::where('key', $idKey)->first();
            $enSetting = Setting::where('key', $enKey)->first();

            if ($idSetting && !empty($idSetting->value)) {
                if (!$enSetting) {
                    Setting::create([
                        'key' => $enKey,
                        'value' => $translate($idSetting->value)
                    ]);
                    $this->line('Translated setting: ' . $idKey);
                } else if (empty($enSetting->value)) {
                    $enSetting->update([
                        'value' => $translate($idSetting->value)
                    ]);
                    $this->line('Translated setting: ' . $idKey);
                }
            }
        }

        $this->info('Translation process completed successfully!');
    }
}
