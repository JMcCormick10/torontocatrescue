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
                    <option value="">--Please choose an option--</option>
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
        <p>Age:</p>

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
        </div>
    </div>


    <div class="select-size">
        <p>Size:</p>

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
        </div>
    </div>

    <div class="select-sex">
        <p>Gender:</p>

        <div>
            <input type="radio" id="yes" name="yes" value="yes" checked>
            <label for="yes">Male</label>
        </div>

        <div>
            <input type="radio" id="no" name="no" value="no">
            <label for="no">Female</label>
        </div>
    </div>
    <span class="tcr-apply-to-adopt submit-filter">View More</span>
    </div>
<!-- you got it boss -->
    <h2>Cat's Available for Adoption</h2>
    <div class="tcr-archive-list">

        <?php
        foreach ($pets as $pet):

            $photos =  $pet->media->photos->photo;

            $name = (array) $pet->name;
            $name = $name[$gross.'t'];

            $photo_to_use = array();
            foreach ($photos as $photo){
                $photo = (array) $photo;

                if ($photo[$gross_at.'size'] == 'x'){
                    $photo_to_use = $photo;
                }
            }
            $photo_url = $photo_to_use[$gross.'t'];

            ?>

            <div class="tcr-item">
                <h3><?=$name?></h3>
                <div class="tcr-cat-image-container">
                    <div class="tcr-cat-image" style="background-image:url('<?=$photo_url;?>');"></div>

                </div>
                <p class="breed"></p>
                <p class="age"></p>
                <p class="description"></p>
                <span class="tcr-apply-to-adopt">View More</span>

            </div>

        <?php endforeach;?>
    </div>
</div>
<div class="tcr-cat-modal">
    <div class="tcr-cat-modal-content">
        <span class="tcr-exit-modal">&times;</span>

        <div class="tcr-cat-info">

        </div>
        <div class="tcr-form-container">
            <!-- SIERRA. PUT YOUR FORM HERE DUDE -->
            <button class="tcr-apply-button">Apply to Adopt </button>
            <div class="tcr-pet-form">
                <?php  echo do_shortcode('[contact-form-7 id="8" title="Adoption Form"]'); ?>
            </div>
        </div>
    </div>
</div>