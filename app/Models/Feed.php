<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $fillable = [
        "url"
    ];
    protected $feedData;

    use HasFactory;

    /**
     * The user that owns this feed
     * 
     * @return Relationship The user that owns this feed
     */
    public function User(){
        return $this->belongsTo("\App\Model\User");
    }

    public function LoadFeed(){
        if(!$this->feedData){
            try{
                $this->feedData = simplexml_load_file( $this->url );
            }
            catch( ErrorException $e ){
                dd($e->message);
            }
        }
    }

    public function GetItems(){
        $this->LoadFeed();
        if( $this->feedData ){
            return $this->feedData->channel->item;
        }
        else{ return false; }
    }

    public function GetTitle(){
        $this->LoadFeed();
        if( $this->feedData ){        
            return $this->feedData->channel->title;
        }
        else{ return false; }
    }
}
