<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 1/26/20
 * Time: 11:15 AM
 */


?>
<div class="container">
    <div class="content">

        <div class="row mx-3">
            <h1 class="my-3">My CD library</h1>
        </div>

        <div class="row filter">

        </div>

        <div class="row cd-block">
            <?php if(isset($this->model->template['cds'])) {


                foreach ($this->model->template['cds'] as $cd){ ?>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 cd-item">
                        <a href="/cd-detail?id=<?php echo htmlspecialchars($cd['id']) ?>">
                            <?php if (isset($cd['picture_link']) && $cd['picture_link']!=""){ ?>
                                <div class="cd-image" ><img class="w-100" src="<?php echo htmlspecialchars($cd['picture_link']) ?>"></div>
                            <?php } else { ?>
                                <div class="cd-image" ><img class="w-100" src="https://www.vinylelite.co.uk/wp-content/uploads/2018/08/default-release-cd-600x600.png"></div>
                            <?php } ?>
                            <div class="cd-title"><h4><?php echo htmlspecialchars($cd['title']) ?> <span class="cd-year">(<?php echo htmlspecialchars($cd['year']) ?>)</span></h4></div>
                            <div class="cd-artist">By: <?php echo htmlspecialchars($cd['artist']) ?></div>
                            <div class="cd-genre"><?php echo htmlspecialchars($cd['genre']) ?></div>
                            <div class="cd-price"><?php echo htmlspecialchars($cd['price']) ?> USD</div>
                        </a>

                        <div>Current rating: <span id="cd-<?php echo htmlspecialchars($cd['id']) ?>-rating"><?php echo (isset($cd['rating']) and $cd['rating']!="") ? htmlspecialchars($cd['rating']):"Not rated"; ?></span></div>
                        <div class="rating">
                            <?php for ($i = 1;$i<=5;$i++){ ?>
                                <a class="star-rating" id="cd-<?php echo htmlspecialchars($cd['id']); ?>-star-<?php echo $i; ?>" href="#"><div class="icon-star-full"></div></a>
                            <?php } ?>
                        </div>
                    </div>


                <?php }
            }?>
        </div>


    </div>

</div>