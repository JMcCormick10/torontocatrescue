<div id="tcr-archive-container">
    <div class="tcr-filter-container">
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
        <div class="tcr-filter select-breed">
            <label for="cat-breed">Breed:</label>
            <select id="cat-breed" class="tcr-select-option" data-filter-group="select-breed">
                <!-- <option value="">--Please choose an option--</option> -->
                <?php
                    foreach($breeds as $breed) :
                    $breed_list = (array) $breed;
                    $breed_list = $breed_list[$gross.'t'];
                ?>
                    <option value="<?= $breed_list ?>" data-filter-value="<?= $breed_list ?>"><?= $breed_list ?></option>
                <?php endforeach;?>
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

        <div class="tcr-filter select-age">
            <label for="select-age">Age:</label>
            <select id="select-age" class="tcr-select-option" data-filter-group="select-age">
                    <option value="Young" data-filter-value="Younge">Young</option>
                    <option value="Adult" data-filter-value="Adult">Adult</option>
                    <option value="Senior" data-filter-value="Senior">Senior</option>
            </select>
        </div>

        <div class="tcr-filter select-size">
            <label for="select-size">Size:</label>
            <select id="select-size" class="tcr-select-option" data-filter-group="select-size">
                <option value="Small" data-filter-value="size-S">Small</option>
                <option value="Medium" data-filter-value="size-M">Medium</option>
                <option value="Large" data-filter-value="size-L">Large</option>
            </select>
        </div>

        <div class="tcr-filter select-sex">
            <label for="select-sex">Sex:</label>
            <select id="select-sex" class="tcr-select-option" data-filter-group="select-sex">
                <option value="sex-M" data-filter-value="sex-M">Male</option>
                <option value="sex-F" data-filter-value="sex-F">Female</option>
            </select>
        </div>
    </div>
    <button class="tcr-apply-to-adopt submit-filter">View More</button>
    </div>
<!-- you got it boss -->
    <h2>Cat's Available for Adoption</h2>
    <div class="tcr-archive-list">

        <?php
        foreach ($pets as $pet):

            $photos =  $pet->media->photos->photo;

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

            $photo_to_use = array();
            foreach ($photos as $photo){
                $photo = (array) $photo;

                if ($photo[$gross_at.'size'] == 'x'){
                    $photo_to_use = $photo;
                }
            }
            $photo_url = $photo_to_use[$gross.'t'];

            ?>

            <div class="tcr-item <?php echo $age.' '.$size.' '.$sex.' '.$breed_list; ?>">
                <h3><?=$name?></h3>
                <div class="tcr-cat-image-container">
                    <div class="tcr-cat-image" style="background-image:url('<?=$photo_url;?>');"></div>
                </div>
                <p class="breed"></p>
                <p class="age"></p>
                <p class="description"></p>
                <button class="tcr-apply-to-adopt">View More</button>

            </div>

        <?php endforeach;?>
    </div>
</div>

<button id="myBtn">Open Modal</button>

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
