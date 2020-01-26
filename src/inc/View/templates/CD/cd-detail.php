<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 1/26/20
 * Time: 10:58 AM
 */




if (isset($template['cd'])){
    $cd = $template['cd'];
?>



    <div class="container">
        <div class="content create-event">

            <div class="row mx-3">
                <?php if (isset($template['cd']['title']) and $template['cd']['title']!=""){ ?>
                    <h1 class="my-3">CD - <?php echo htmlspecialchars($template['cd']['title']); ?></h1>
                <?php } ?>
            </div>
            <div class="create-event-wrapper row">

                <div class="col-12 col-md-6">
                    <div class="cd-title"><h4><?php echo htmlspecialchars($cd['title']) ?> <span class="cd-year">(<?php echo htmlspecialchars($cd['year']) ?>)</span></h4></div>
                    <div class="cd-artist">By: <?php echo htmlspecialchars($cd['artist']) ?></div>
                    <div class="cd-genre"><?php echo htmlspecialchars($cd['genre']) ?></div>
                    <div class="cd-price"><?php echo htmlspecialchars($cd['price']) ?> USD</div>
                    <div>
                        <?php if (isset($cd['rating']) && $cd['rating']>0){ ?>
                            <div>Stars: <?php echo htmlspecialchars($cd['rating']); ?></div>
                        <?php } ?>
                    </div>
                    <div class="cd-youtube"><a target="_blank" href="https://www.youtube.com/results?search_query=<?php echo htmlspecialchars($cd['artist']) ?>+<?php echo htmlspecialchars($cd['title']) ?>">Search on youtube</a></div>
                </div>
                <div class="col-12 col-md-6">
                    <?php if (isset($cd['picture_link']) && $cd['picture_link']!=""){ ?>
                        <div class="cd-image" ><img class="w-100" src="<?php echo htmlspecialchars($cd['picture_link']) ?>"></div>
                    <?php } else { ?>
                        <div class="cd-image" ><img class="w-100" src="https://www.vinylelite.co.uk/wp-content/uploads/2018/08/default-release-cd-600x600.png"></div>
                    <?php } ?>
                </div>

            </div>
            <div class="row">
                <form method="post" action="/cd-detail">
                    <input type="hidden" value="<?php echo htmlspecialchars($cd['id']) ?>" name="cd-id-delete" />
                    <input type="submit" value="Delete Album" name="delete"/>
                </form>
            </div>



        </div>

    </div>
<?php }else { ?>

    <div class="container">
        <div class="content create-event">

            <div class="row mx-3">
                <p>This CD doesnt exist in database</p>
                <p><a href="/dashboard">Check the available CDs here</a></p>
            </div>
        </div>

    </div>


<?php }