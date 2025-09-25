<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{
    use HasFactory;

    // Mass-assignable velden
    protected $fillable = [
        'name',
        'filesize',
        'originUrl',
        'filename',
        'downloadedServer',
        'visits',
        'brand_id'
    ];

    /**
     * Relatie naar Brand
     * Een manual behoort tot één brand
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Returns the filesize in a human readable format
     */
    public function getFilesizeHumanReadableAttribute()
    {
        $size = $this->filesize;

        if ($size >= 1 << 30) {
            return number_format($size / (1 << 30), 2) . ' GB';
        } elseif ($size >= 1 << 20) {
            return number_format($size / (1 << 20), 2) . ' MB';
        } elseif ($size >= 1 << 10) {
            return number_format($size / (1 << 10), 2) . ' KB';
        } else {
            return number_format($size) . ' bytes';
        }
    }

    /**
     * Returns true if the file is locally available
     */
    public function getLocallyAvailableAttribute()
    {
        return !empty($this->filename);
    }

    /**
     * Returns the URL to the manual
     */
    public function getUrlAttribute()
    {
        // Standaard gebruik originUrl
        return $this->originUrl;

        // Optioneel voor CDN:
        /*
        if (!empty($this->filename)) {
            return 'http://cdn.downloadyourmanual.com/' . $this->filename;
        }

        return $this->originUrl;
        */
    }
}
