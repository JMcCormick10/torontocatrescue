<?php

/* ----------------------------------------------- *\
                THE FILTERS
\* ----------------------------------------------- */
?>
<div id="tcr-archive-container">
    <div class="filters">
        <!-- 1.) GRAB BREED DATA -->
        <?php
        $gross = '$';
        $gross_at = '@';
        foreach($breeds as $breed)
        {
            //$breed_name = (array) breed;
            //var_dump($breed);
            $breed_list = (array) $breed;
            $breed_list = $breed_list[$gross.'t'];
            //echo $breed_list;
        }
        ?>
        <div class="select-breed">
            <label for="cat-breed">Breed:</label>
            <div>
                <select id="cat-breed">
                    <!-- <option value="">--Please choose an option--</option> -->
                    <?php
                        foreach($breeds as $breed) :
                        $breed_list = (array) $breed;
                        $breed_list = $breed_list[$gross.'t'];
                    ?>
                        <option value="<?= $breed_list ?>"><?= $breed_list ?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="select-age">
        <!-- <p>Age:</p>
                            
        <div>
            <input type="radio" id="Adult" name="Adult" value="Adult" checked>
            <label for="Adult">Adult</label>
        </div>

        <div>
            <input type="radio" id="Senior" name="Senior" value="Senior">
            <label for="Senior">Senior</label>
        </div>

        <div>
            <input type="radio" id="young" name="young" value="young">
            <label for="young">Young</label>
        </div> -->
        <label for="select-age">Age:</label>
        <div>
            <select id="select-age">
                    <option value="Young">Young</option>
                    <option value="Adult">Adult</option>
                    <option value="Senior">Senior</option>
            </select>
        </div>
        
    </div>


    <div class="select-size">
        <!-- <p>Size:</p>


        <div>
            <input type="radio" id="S" name="S" value="S" checked>
            <label for="S">Small</label>
        </div>

        <div>
            <input type="radio" id="M" name="M" value="M">
            <label for="M">Medium</label>
        </div>

        <div>
            <input type="radio" id="L" name="L" value="L">
            <label for="L">Large</label>
        </div>

        <div>
            <input type="radio" id="XL" name="XL" value="XL">
            <label for="XL">Extra-Large</label>
        </div> -->
        <label for="select-size">Size:</label>
        <div>
            <select id="select-size">
                <option value="Small">Small</option>
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
            </select>
        </div>
       
    </div>

    <div class="select-sex">
        <!-- <p>Gender:</p>

        <div>
            <input type="radio" id="yes" name="yes" value="yes" checked>
            <label for="yes">Male</label>
        </div>

        <div>
            <input type="radio" id="no" name="no" value="no">
            <label for="no">Female</label>
        </div> -->
        <label for="select-sez">Size:</label>
        <div>
            <select id="select-sex">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
    </div>
    <span class="tcr-apply-to-adopt submit-filter">View More</span>
</div>



<?php
/* ----------------------------------------------- *\
                THE LIST OF CATS
\* ----------------------------------------------- */?>
    <h2>Cat's Available for Adoption</h2>
    <div class="tcr-archive-list">

        <?php
        foreach ($pets as $pet):


            //name
            $name = (array) $pet->name;
            $name = $name[$gross.'t'];

            //photos
            $photo_to_use = array();
            $photos =  $pet->media->photos->photo;
            foreach ($photos as $photo){
                $photo = (array) $photo;

                if ($photo[$gross_at.'size'] == 'x'){
                    $photo_to_use = $photo;
                }
            }
            $photo_url = $photo_to_use[$gross.'t'];

            //sex
            $pet_sex_array = (array) $pet->sex;
            $pet_sex = $pet_sex_array[$gross.'t'];


            //breed
            $breed_list = [];
            foreach($pet->breeds->breed as $breed) {
                if (gettype($breed) == 'string') {
                    $breed_list [] =  $breed.'';
                } else {
                    $breeds = (array)$breed;
                    $breed_list[] = $breeds[$gross.'t'].'';
                }
            }

            //age
            $age_array = (array) $pet->age;
            $pet_age = $age_array[$gross.'t'];

            //description
            $description_array = (array) $pet->description;
            $pet_description = $description_array[$gross.'t'];
            ?>

            <div class="tcr-item" data>
                <h3><?=$name?></h3>
                <div class="tcr-cat-image-container">
                    <div class="tcr-cat-image" style="background-image:url('<?=$photo_url;?>');"></div>

                </div>
                <span class="tcr-apply-to-adopt">View More</span>
                <div class="tcr-cat-data">
                    <div class="tcr-data-row">
                        <div class="tcr-data-col pl-0">
                            <div class="tcr-cat-image" style="background-image:url('<?=$photo_url;?>');"></div>
                        </div>
                        <div class="tcr-data-col">
                            <h2><strong>Name: </strong><?=$name;?></h2>
                            <div class="tcr-modal-info-section">
                                <p><strong>Sex: </strong><?=$pet_sex;?></p>
                                <p><strong>Breeds: </strong>
                                    <?php 
                                    $counter = 1;
                                    $breed_count = count($breed_list);    
                                    foreach ($breed_list as $breed):
                                        echo $breed;
                                        if ($counter != $breed_count) echo ', ';
                                        $counter++;
                                     endforeach;?>
                                </p>
                                <p><strong>Age: </strong><?=$pet_age;?></p>
                            </div>
                        </div>
                        <p><strong>Description: </strong><?=$pet_description;?></p>


                    </div>

                </div>

            </div>

            
        <?php endforeach;?>
    </div>
</div>



<?php
/* ----------------------------------------------- *\
                THE MODALS
\* ----------------------------------------------- */?>
<div class="tcr-cat-modal">

    <div class="tcr-cat-modal-content">
        <span class="tcr-exit-modal">&times;</span>

        <div class="tcr-modal-button-container">
            <button class="tcr-view-info">View Info </button>
            <button class="tcr-apply-button">Apply to Adopt </button>
        </div>
        

        <div class="tcr-modal-wrapper">
            <div class="tcr-cat-info">

            </div>
            <div class="tcr-form-container">
                <!-- SIERRA. PUT YOUR FORM HERE DUDE -->
                <div class="tcr-pet-form">
                    <?php  echo do_shortcode('[contact-form-7 id="8" title="Adoption Form"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>