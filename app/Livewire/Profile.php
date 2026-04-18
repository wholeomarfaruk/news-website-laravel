<?php

namespace App\Livewire;

use App\Models\Media;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component

{
    use WithFileUploads;
    public bool $isProfileInfoModal = false;
    public bool $isProfileAddressModal = false;
    public  $profile;
    public $email;
    public $name;
    public $designation;
    public $phone;
    public $bio;
    public $profile_picture;
    public $profileImage;
    public $instagram, $facebook, $twitter,$linkedin;
    public $address, $city, $country, $postal_code;

    public function mount()
    {
        $this->profile = auth()->user()->profile;
        if(!$this->profile || !$this->profile->exists) {
      return abort(404, 'Profile not found');
        }

        $this->email = $this->profile->email;
        $this->name = $this->profile->name;
        $this->designation = $this->profile->user->roles()->first()->name;
        $this->phone = $this->profile->phone;
        $this->phone = $this->profile->phone;
        $this->bio = $this->profile->bio;
        //social
        $this->instagram = $this->profile->instagram;
        $this->facebook = $this->profile->facebook;
        $this->twitter = $this->profile->twitter;
        $this->linkedin = $this->profile->linkedin;
        $this->profileImage = $this->profile->image;
    }
    public function render()
    {
        return view('livewire.profile');
    }
    public function updateProfile()
    {
        $this->profile->update([
            'name' => $this->name,
            'phone' => $this->phone,
            'bio' => $this->bio,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'linkedin' => $this->linkedin
        ]);
        $this->profile->user->update([
            'name' => $this->name
        ]);
            if ($this->profile_picture) {

                // Store file in 'public/media'
                $path = $this->storeFeaturedImage($this->profile_picture);

                // Save in media table
                $media = new Media();
                $media->filename = basename($path);
                $media->original_name = $this->profile_picture->getClientOriginalName();
                $media->mime_type = $this->profile_picture->getMimeType();
                $media->extension = $this->profile_picture->getClientOriginalExtension();
                $media->size = $this->profile_picture->getSize();
                $media->type = 'image';
                $media->category = 'profile_picture';
                $media->disk = 'public';
                $media->path = $path;
                $media->mediable_id = $this->profile->id;
                $media->mediable_type = UserProfile::class;
                // if ($this->fi_caption) {
                //     $media->caption = $this->fi_caption;
                // }

                $media->user_id = auth()->id();
                $media->save();
            } 
        $this->isProfileInfoModal = false;

    }
        public function updateAddress()
    {
        $this->profile->update([
            'address' => $this->address,
            'country' => $this->country,
            'city' => $this->city,
            'postal_code' => $this->postal_code,
        ]);
        $this->isProfileAddressModal = false;

    }
        protected function storeFeaturedImage($file)
    {
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('uploads/media');

        // Create directory if it doesn't exist
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true); // recursive
        }

        // Move uploaded file
        $file->storeAs('media', $filename);

        // Return relative path for database
        return 'media/' . $filename;
    }
}
