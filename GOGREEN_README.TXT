Implementation
    - Feeds are loaded once per pageload at most and cached within the model.  They aren't cached on the database between loads, although that's possibly worth thinking about.
    - Feed items could potentially be implemented as Models in themselves.  This would allow ordering all items by date and mingling feeds. 
    - Although I CAN design UI and style HTML, zero attempt has been made to style the application given the bounds of the exercise are ( I understand ) Laravel expertise.
    - I've played a little fast and loose with some variables; to avoid messing around with symlinks, I've just created a CSS file in the /public/assets/css directory.  I've also hard-coded the name of the site in the blade, otherwise it should be set in the .env file.  Neither of these are particularly big deals, but I should probably mention that I know I've overridden some Laravel functionality :)  

Critique / Testing
    - No attempt has been made to provision for an feed 404.  Normally I absolutely would never do this, but this is a simple demonstration.  Suffice to say that in native PHP a try-catch block around the simplexml_load_file() call could catch a 404 error and handle it elegantly, although Laravel interferes with that so its native error handling would need overriding.  I hope you'd not be offended by my considering that outside the bounds of this exercise.  In other words, this is the first test I'd suggest, completely in the knowledge that it would fail in current state :)
    - URL input is validated by Laravel's standard URL validation.  Malformed URLs are rejected outright with no error message.  Again, terrible practice, would never do it in the wild. 
    - Login and user management are standard Laravel auth.
    - In terms of pen testing, Laravel's functionality should be pretty tight but feeding malicious values to the feed input and the registration / login forms would be a wise experiment.  Users should not be able to load each others' feeds by supplanting the ID in the URL; again, worth testing.  Also worth testing: logging out and trying to load a feed, logging out and hitting the back button to a logged in feed.  Both of these should be fine but that's where I'd kick it.

Installation:
    This is a GIT repo with the standard Laravel ignore file, mostly to avoid spending an entire weekend checking in the /vendors directory.
    This is probably best installed with Composer; it should be a simple case of cloning the repo and running
    
    > composer create-project laravel/laravel greenreader

    and then checking out this repo to the created "greenreader" directory.

    Once the files are in place, it will be necessary to run Laravel migrations (having made sure the credentials in .env are correct and the database schema exists) using 
    > artisan migrate
    from the "greenreader" directory.

Thanks,
Rich Gwilliam