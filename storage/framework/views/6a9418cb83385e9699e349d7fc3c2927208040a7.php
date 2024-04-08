<?php
   $continents = [
         'Africa' =>  array('Algeria','Angola','Benin','Botswana','Burkina Faso','Burundi','Cabo Verde','Cameroon','Central African Republic','Chad','Comoros','Democratic Republic of the Congo','Republic of the Congo','Cote d\'Ivoire','Djibouti','Egypt','Equatorial Guinea','Eritrea','Ethiopia','Gabon','Gambia','Ghana','Guinea','Guinea Bissau','Kenya','Lesotho','Liberia','Libya','Madagascar','Malawi','Mali','Mauritania','Mauritius','Morocco','Mozambique','Namibia','Niger','Nigeria','Rwanda','Sao Tome and Principe','Senegal','Seychelles','Sierra Leone','Somalia','South Africa','South Sudan','Sudan','Swaziland','Tanzania','Togo','Tunisia','Uganda','Zambia','Zimbabwe'),
         'NorthAmerica' => array('Antigua and Barbuda','Bahamas','Barbados','Belize','Canada','Costa Rica','Cuba','Dominica','Dominican Republic','El Salvador','Grenada','Guatemala','Haiti','Honduras','Jamaica','Mexico','Nicaragua','Panama','Saint Kitts and Nevis','Saint Lucia','Saint Vincent and the Grenadines','Trinidad and Tobago','United States of America'),
         'SouthAmerica' => array('Argentina', 'Bolivia','Brazil','Chile','Colombia','Ecuador','Guyana','Paraguay','Peru','Suriname','Uruguay','Venezuela'),
         'Europe' => array('Albania','Andorra','Armenia','Austria','Azerbaijan','Belarus','Belgium','Bosnia and Herzegovina','Bulgaria','Croatia','Cyprus','Czech Republic','Denmark','Estonia','Finland','France','Georgia','Germany','Greece','Iceland','Ireland','Italy','Kazakhstan','Kosovo','Latvia','Liechtenstein','Lithuania','Luxembourg','Macedonia','Malta','Moldova','Monaco','Montenegro','Netherlands','Norway','Poland','Portugal','Romania','Russia','San Marino','Serbia','Slovakia','Slovenia','Spain','Sweden','Switzerland','Turkey','Ukraine','United Kingdom','Vatican City'),
         'Asia' => array('Armenia','Azerbaijan','Bahrain','Bangladesh','Bhutan','Brunei', 'Cambodia','China','Cyprus','Georgia','India','Indonesia','Iran','Iraq','Israel', 'Japan','Jordan','Kazakhstan','Kuwait','Kyrgyzstan','Laos','Lebanon','Malaysia','Maldives','Mongolia','Myanmar','Nepal','North Korea','Oman','Pakistan','Palestine','Philippines','Qatar','Russia','Saudi Arabia','Singapore','South Korea','Sri Lanka','Syria','Taiwan','Tajikistan','Thailand','Timor Leste','Turkey','Turkmenistan','United Arab Emirates','Uzbekistan','Vietnam','Yemen')
     ];
   ?>



<?php $__env->startSection('content'); ?>
<main id="main" class="main">
    <section class="section  dashboard">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('users.index')); ?>">Users</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-body p-5">
                    <?php echo Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch','files' => true,'class' => 'formAlert']); ?>

                        <?php echo $__env->make('users.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
    </section>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script>
    // Get all checkboxes with class 'country'
    const checkboxes = document.querySelectorAll('.country');

    // Get the div to display selected countries
    const selectedCountriesDiv = document.getElementById('selected-countries');

    // Function to update selected countries in the HTML tag
    function updateSelectedCountries() {
        const selectedCountries = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);
    //        selectedCountriesDiv.textContent = `Selected Countries: ${selectedCountries.join(', ')}`;
    }


    // Add event listener to each checkbox
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedCountries);
    });
    // Get all continent checkboxes
    const continentCheckboxes = document.querySelectorAll('.continent-checkbox');

    // Function to handle continent checkbox change
    function handleContinentChange(event) {
    const continentName = event.target.value;
    const countryCheckboxes = document.querySelectorAll(`.country.${continentName}`);
    countryCheckboxes.forEach(checkbox => {
        checkbox.checked = event.target.checked;
        updateSelectedCountries();
    });
    }

    // Add event listener to continent checkboxes
    continentCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', handleContinentChange);
    });
 </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\gcl\resources\views/users/edit.blade.php ENDPATH**/ ?>