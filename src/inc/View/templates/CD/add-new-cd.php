<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 1/26/20
 * Time: 11:02 AM
 */

?>


<div class="container">
    <div class="content create-event">

        <div class="row mx-3">
            <?php if (isset($template['action']) and $template['action']=="add-new-cd"){ ?>
                <h1 class="my-3">Add new CD</h1>
            <?php } else { ?>
                <h1 class="my-3">Edit CD</h1>
            <?php } ?>
        </div>
        <div class="create-event-wrapper mx-auto">

            <!--                    $vars = array ("title","artist_id","genre","year","price");-->
            <form id="event-create" action="/<?php echo htmlspecialchars($template['action']); ?>" method="post">
                <div class="row m-0">
                    <div class="p-3 col-12 col-lg-6 pr-lg-5">
                        <div><label for="title">Title:</label><span id="loadCDData" style="border:1px black solid;margin-left:50px;padding:10px;font-size:16pt;">Load data from title</span></div>
                        <input class="col-12" name="title" id="title" placeholder="Enter album title..." type="text" value="<?php echo (isset($template['http-data']['title'])) ? htmlspecialchars($template['http-data']['title']):""; ?>"/><br>

                        <div><label for="genre">Genre:</label></div>
                        <input class="col-12" name="genre" id="genre" placeholder="Genre..." type="text" value="<?php echo (isset($template['http-data']['genre'])) ? htmlspecialchars($template['http-data']['genre']):""; ?>"/><br>

                        <div><label for="year">Year:</label></div>
                        <input class="col-12" name="year" id="year" placeholder="Year..." type="text" value="<?php echo (isset($template['http-data']['year'])) ? htmlspecialchars($template['http-data']['year']):""; ?>"/><br>

                        <div><label for="price">Price:</label></div>
                        <input class="col-12" name="price" id="price" placeholder="Price..." type="text" value="<?php echo (isset($template['http-data']['price'])) ? htmlspecialchars($template['http-data']['price']):""; ?>"/><br>

                        <div><label>Artist:</label></div>
                        <input class="col-12" name="artist" id="artist" placeholder="Artist..." type="text" value="<?php echo (isset($template['http-data']['artist'])) ? htmlspecialchars($template['http-data']['artist']):""; ?>"/><br>

                    </div>
                    <div class="p-3 col-12 col-lg-6 pl-lg-5">
                        <label for="cd-cover">Insert link for CD cover:</label>
                        <input class="col-12" type="text" name="cd-cover" id="cd-cover" value="<?php echo (isset($template['http-data']['artist'])) ? htmlspecialchars($template['http-data']['artist']):""; ?>"/>
                    </div>

                    <input type="hidden" name="hidden-status" value="<?php echo (isset($template['action']) and $template['action']=="add-new-cd")? "new":"edit" ?>">
                </div>

                <div class="row m-0">
                    <input class="mx-3 mt-lg-5" type="submit" value="Save CD">
                </div>
            </form>
        </div>
    </div>
</div>
