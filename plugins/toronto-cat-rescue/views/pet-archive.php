<?php

/* ----------------------------------------------- *\
                THE FILTERS
\* ----------------------------------------------- */
?>
<div id="tcr-archive-container">
    <div class="tcr-filter-container">
        <!-- 1.) GRAB BREED DATA -->
        <?php
            $gross = '$';
            $gross_at = '@';
            foreach($breeds as $breed) {
                $breed_list = (array) $breed;
                $breed_list = $breed_list[$gross.'t'];
            }
        ?>
        <div class="tcr-filter select-breed">
            <label for="cat-breed">Breed</label>
            <select id="cat-breed" class="tcr-select-option" data-filter-group="select-breed">
                <option></option>
            <?php
                foreach($breeds as $breed) :
                    $breed_list = (array) $breed;
                    $breed_list = $breed_list[$gross.'t'];
            ?>
                <option value="<?= $breed_list ?>" data-filter-value="<?= $breed_list ?>"><?= $breed_list ?></option>
            <?php endforeach;?>
            </select>
        </div>

        <div class="tcr-filter select-age">
            <label for="select-age">Age</label>
            <select id="select-age" class="tcr-select-option" data-filter-group="select-age">
                <option></option>
                <option value="Young" data-filter-value="Younge">Young</option>
                <option value="Adult" data-filter-value="Adult">Adult</option>
                <option value="Senior" data-filter-value="Senior">Senior</option>
            </select>
        </div>

        <div class="tcr-filter select-size">
            <label for="select-size">Size</label>
            <select id="select-size" class="tcr-select-option" data-filter-group="select-size">
                <option></option>
                <option value="Small" data-filter-value="size-S">Small</option>
                <option value="Medium" data-filter-value="size-M">Medium</option>
                <option value="Large" data-filter-value="size-L">Large</option>
            </select>
        </div>

        <div class="tcr-filter select-sex">
            <label for="select-sex">Gender</label>
            <select id="select-sex" class="tcr-select-option" data-filter-group="select-sex">
                <option></option>
                <option value="sex-M" data-filter-value="sex-M">Male</option>
                <option value="sex-F" data-filter-value="sex-F">Female</option>
            </select>
        </div>

        <div class="tcr-filter clear-filter">
            <button class="tcr-clear-filter">Clear</button>
        </div>
    </div>
    <!-- you got it boss -->
    <h2>Cat's Available for Adoption</h2>
    <div class="tcr-archive-list">

        <?php
        foreach ($pets as $index => $pet):
            //id
            $id = (array) $pet->id;
            $id = $id[$gross.'t'];

            //name
            $name = (array) $pet->name;
            $name = $name[$gross.'t'];

            $age = (array)$pet->age;
            $age = $age[$gross.'t'];

            $size = (array)$pet->size;
            $size = 'size-'.$size[$gross.'t'];

            $sex = (array)$pet->sex;
            $sex = 'sex-'.$sex[$gross.'t'];

            $breed_list = '';
            foreach($pet->breeds->breed as $breed) {
                if (gettype($breed) == 'string') {
                    $breed_list .= $breed.' ';
                } else {
                    $breeds = (array)$breed;
                    $breed_list .= $breeds[$gross.'t'].' ';
                }
            }

            $feature_photo = [];
            $carousel = [];
            $photos =  $pet->media->photos->photo;
            foreach ($photos as $photo){
                $photo = (array) $photo;
                if ($photo[$gross_at.'size'] == 'x'){
                    $feature_photo = $photo;
                    $carousel[] = $photo[$gross.'t'];
                }
            }
            $photo_url = $feature_photo[$gross.'t'];
            //description
            $description_array = (array) $pet->description;
            $pet_description = $description_array[$gross.'t'];
            // $string = preg_replace('/[\x00-\x1F\x7F]/u', '', $string)
            $pet_description = preg_replace('/[[:^print:]]/', '', $pet_description);
            // $pet_description = str_replace('', "'", $pet_description);

            ?>

            <div class="tcr-item <?php echo $age.' '.$size.' '.$sex.' '.$breed_list; ?>">
                <div class="tcr-cat">
                    <h3 class="tcr-name"><?=$name?></h3>
                    <div class="tcr-cat-image-container">
                        <div class="tcr-cat-image" style="background-image:url('<?=$photo_url;?>');"></div>
                    </div>
                    <div class="tcr-cat-body">
                        <p><?=$breed_list;?></p>
                        <p><strong><?=$age;?>&nbsp;&nbsp;&bull;&nbsp;&nbsp;<?=($sex == 'sex-F' ? 'Female' : 'Male');?>&nbsp;&nbsp;&bull;&nbsp;&nbsp;<?=($size == 'size-S' ? 'Small' : ($size == 'size-M' ? 'Medium' : 'Large'))?></strong></p>
                    </div>
                    <div class="tcr-cat-footer">
                        <button data-cat="cat-<?=$index;?>" data-cat-id="<?=$id;?>" data-cat-name="<?=$name;?>" class="tcr-apply-to-adopt">View More</button>
                    </div>
                </div>
                <div id="cat-<?php echo $index; ?>" class="tcr-cat-data">
                    <div>
                        <?php if ($carousel): ?>
                            <div class="carousel">
                            <?php foreach ($carousel as $image): ?>
                                <img src="<?=$image;?>" alt="">
                            <?php endforeach ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="tcr-data-row no-gutters">
                        <div class="tcr-cat-modal-info">
                            <h2><?=$name;?></h2>
                            <p><strong>Age: </strong><?=$age;?></p>
                            <p><strong>Gender: </strong><?=($sex == 'sex-F' ? 'Female' : 'Male');?></p>
                            <p><strong>Size: </strong><?=($size == 'size-S' ? 'Small' : ($size == 'size-M' ? 'Medium' : 'Large'))?></p>
                        </div>
                        <div class="tcr-cat-modal-desc">
                            <p><strong>About <?=$name;?> <br /></strong><?=html_entity_decode($pet_description);?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>

<div class="tcr-no-cats">
    <p><strong>We couldn't find your purrr-fect cat.</strong><br />Please update your search purrr-ametres.</p>
</div>



<?php
/* ----------------------------------------------- *\
                THE MODALS
\* ----------------------------------------------- */?>
<div class="tcr-cat-modal">

    <div class="tcr-cat-modal-content">
        <div class="tcr-modal-header">
            <button class="tcr-view-info active">View Info</button>
            <button class="tcr-apply-button">Apply to Adopt</button>
            <span class="tcr-exit-modal">&times;</span>
        </div>


        <div class="tcr-modal-body">
            <div class="tcr-cat-info">

            </div>
            <div class="tcr-form-container">
                <div class="tcr-pet-form">
                    <?php  echo do_shortcode('[contact-form-7 id="'.$form_id.'" title="Adoption Form"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
