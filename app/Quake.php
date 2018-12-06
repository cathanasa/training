<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quake extends Model  {

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quakes';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['mag', 'place', 'time', 'updated', 'tz', 'url', 'felt', 'cdi', 'mmi', 'alert', 'status', 'tsunami', 'sig', 'net', 'code', 'ids', 'sources', 'types', 'nst', 'dmin', 'rms', 'gap', 'mag_type', 'type', 'title', 'json', 'description', 'created_at', 'updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = ['tsunami' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    public function getDyfiAttribute(){

        $dJson = json_decode($this->json, true);
        if (isset($dJson['properties']['products']['dyfi'][0]['contents'])){
            foreach ($dJson['properties']['products']['dyfi'][0]['contents'] as $content) {
                if ($content['contentType'] == 'application/pdf'){
                    $found = $content['url'];
                    break;
                }
            }
        }
        return $found;
    }

    public function getFiniteFaultAttribute(){

        $dJson = json_decode($this->json, true);
        if (isset(end($dJson['properties']['products']['finite-fault'])['contents'])){
            reset($dJson);
            foreach (end($dJson['properties']['products']['finite-fault'])['contents'] as $content) {
                if ($content['contentType'] == 'text/html'){
                    $found = $content['url'];
                    break;
                }
            }
        }
        return $found;
    }

    public function getGeneralLinkAttribute(){

        $dJson = json_decode($this->json, true);
        if (isset($dJson['properties']['products']['general-link'])){
            foreach ($dJson['properties']['products']['general-link'] as $link) {
                $found[] = array('text' => $link['properties']['text'], 'url' => $link['properties']['url']);
            }
        }
        return $found;
    }

}