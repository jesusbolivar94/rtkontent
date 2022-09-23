<?php

    /**
     *  require $api from kontent/api.php
     */

    use Kontent\Ai\Delivery\QueryParams;

    // Devuelve lista de publicaciones
    $contents = $api->getItems();

    if ( $contents->pagination->count > 0 ) {

        foreach ( $contents->items as $content ) {

            $lastModified = $content->system->lastModified;

            ?>
            <div class="card w-50 mx-auto my-5">
                <div class="card-body">
                    <h5 class="card-title position-relative">
                        <?php echo $content->system->name?>
                        <div class="position-absolute top-0 end-0 text-muted fs-6">
                            <?php echo $lastModified->format('d-m-Y H:i')?>
                        </div>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $content->system->id?></h6>
                    <p class="card-text">
                        <?php echo $content->texto?>
                    </p>
                </div>
            </div>
            <?php

        }

    } else {

        ?>
        <p class="my-3 text-center">No hay publicaciones disponibles.</p>
        <?php

    }
