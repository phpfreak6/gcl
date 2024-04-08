
<?php $__env->startSection('title', 'Address Details'); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .error {
            border: 1px solid red;
        }
    </style>
    <style>
        /* Hide the <p> tags initially */
        .hidden {
            display: none;
        }

        .modal-lg {
            max-width: 90%;
        }

        .modal-body {
            max-height: calc(100vh - 200px);
            /* Adjust the height of the modal body to make it scrollable */
            overflow-y: auto;
            /* Enable vertical scrolling */
        }
    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main id="main" class="main">

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <section class="section dashboard">
            <form action="<?php echo e(route('quote.saveBooking')); ?>" id="quoteForm" method="POST">
                <?php echo csrf_field(); ?>
                <input type="text" value="<?php echo e($date); ?>" name="shipt_to_collection_date" hidden>
                <input type="text" value="<?php echo e($time); ?>" name="shipt_to_collection_time" hidden>
                <input type="text" value="<?php echo e($presetId); ?>" name="preset_id" hidden>
                <input type="text" value="<?php echo e($courierName); ?>" name="courier" hidden>
                <input type="text" value="<?php echo e($courierPrice); ?>" name="courier_price" hidden>
                <div id="addressFields" class=" my-4 py-5 px-4  form bg-white shadow "
                    style="position: relative; z-index: 1; border-left: 6px solid #309cdc; border-top: 2px solid #309cdc;">
                    <div class="panel-body custom-forms splitter checkout_form">
                        <div class="row">
                            <div class="col-md-6 col-xs-12 collection_side">
                                <h3>Goods Description</h3>
                                <div class="row form-pad">
                                    <div class="form-group clearfix">
                                        <div class="col-xs-12 col-sm-12">
                                            <textarea name="description" id="collection_notes" placeholder="Please let us know what you are sending..."
                                                required="required" class="form-control my-2 py-2 my-2 input_error" ontouchend="toggleVisibilityWithDelay(this)"
                                                onkeyup="toggleVisibilityWithDelay(this)">
                                            </textarea>
                                            <p id="collection_notes-p" class="hidden" onclick="editEmail(this)">
                                            </p>
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12 collection_side_r">
                                <h3>Email Address</h3>
                                <div class="row form-pad">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-12 bill_email">
                                            <input value="<?php echo e(Auth::User()->email); ?>" name="email" type="email"
                                                placeholder="Email Address" id="billing_email_address" autocomplete="nopee"
                                                class="form-control my-2 py-2 my-2 input_error"
                                                ontouchend="toggleVisibilityWithDelay(this)"
                                                onkeyup="toggleVisibilityWithDelay(this)">
                                            <p id="billing_email_address-p" class="hidden" onclick="editEmail(this)">
                                            </p>
                                            <div class="xnote">Email address used for invoices and labels.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clr"></div>
                            <div class="col-md-6 col-xs-12 collection_side">
                                <div class="row form-pad">
                                    <div class="collection_address">
                                        <div style="height: 20px;">
                                            <!---->
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="collection_address1"
                                                class="control-label col-sm-12 col-xs-12 is-error-field">
                                                <b> Collect From:</b>
                                                <div class="emnote">Enter company name if commercial.</div>
                                            </label>
                                            <div class="col-xs-12 col-sm-12">
                                                <input name="origin_name"
                                                    value="<?php echo e(!empty(Session::get('quote_input')['origin_postal']) && Session::get('quote_input')['origin_postal'] == Auth::user()->postal ? Auth::user()->company_name : ''); ?>"
                                                    type="text" placeholder="Company Name" id="collection_address1"
                                                    autocomplete="organization" maxlength="100" required="required"
                                                    class="form-control my-2 py-2 input_error"
                                                    ontouchend="toggleVisibilityWithDelay(this)"
                                                    onkeyup="toggleVisibilityWithDelay(this)">
                                                <p id="collection_address1-p" class="hidden" onclick="editEmail(this)">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <div class="col-xs-12 col-sm-12">
                                                <input name="origin_address_1" id="origin_address_1"
                                                    value="<?php echo e(!empty(Session::get('quote_input')['origin_postal']) && Session::get('quote_input')['origin_postal'] == Auth::user()->postal ? Auth::user()->address_1 : ''); ?>"
                                                    type="text" placeholder="Address Line 2" autocomplete="address-line1"
                                                    maxlength="100" required="required"
                                                    class="form-control my-2 py-2 my-2 form-control my-2 py-2 my-2 input_error"
                                                    ontouchend="toggleVisibilityWithDelay(this)"
                                                    onkeyup="toggleVisibilityWithDelay(this)">
                                                <p id="origin_address_1-p" class="hidden" onclick="editEmail(this)">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <div class="col-xs-12 col-sm-12">
                                                <input name="origin_address_2" id="origin_address_2"
                                                    value="<?php echo e(!empty(Session::get('quote_input')['origin_postal']) && Session::get('quote_input')['origin_postal'] == Auth::user()->postal ? Auth::user()->address_2 : ''); ?>"
                                                    type="text" autocomplete="address-line2"
                                                    placeholder="Address Line 3" maxlength="40"
                                                    class="form-control my-2 py-2 my-2"
                                                    ontouchend="toggleVisibilityWithDelay(this)"
                                                    onkeyup="toggleVisibilityWithDelay(this)">
                                                <p id="origin_address_2-p" class="hidden" onclick="editEmail(this)">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <div class="col-xs-12 col-sm-12">
                                                <input name="origin_city" id="origin_city" type="text"
                                                    value="<?php echo e(!empty(Session::get('quote_input')['origin_postal']) && Session::get('quote_input')['origin_postal'] == Auth::user()->postal ? Auth::user()->city : ''); ?>"
                                                    autocomplete="address-level2" placeholder="City / Town"
                                                    maxlength="40" class="form-control my-2 py-2 my-2"
                                                    ontouchend="toggleVisibilityWithDelay(this)"
                                                    onkeyup="toggleVisibilityWithDelay(this)">
                                                <p id="origin_city-p" class="hidden" onclick="editEmail(this)">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <label for="collection_postcode" class="control-label col-sm-12 col-xs-12">
                                                Country: </label>
                                            <div class="col-xs-12 col-sm-12">
                                                <input disabled
                                                    value="<?php echo e(!empty(Session::get('quote_input')['origin_country']) ? Session::get('quote_input')['origin_country'] : ''); ?>"
                                                    autocomplete="address-level3" type="text" placeholder="County"
                                                    maxlength="40" class="form-control my-2 py-2 my-2">
                                                <input hidden name="origin_country"
                                                    value="<?php echo e(!empty(Session::get('quote_input')['origin_country']) ? Session::get('quote_input')['origin_country'] : ''); ?>"
                                                    autocomplete="address-level3" type="text" placeholder="County"
                                                    maxlength="40" class="form-control my-2 py-2 my-2">
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <label for="collection_postcode" class="control-label col-sm-12 col-xs-12">
                                                Postcode: </label>
                                            <div class="col-xs-12 col-sm-12">
                                                <input
                                                    value="<?php echo e(!empty(Session::get('quote_input')['origin_postal']) ? Session::get('quote_input')['origin_postal'] : ''); ?>"
                                                    type="text" name="origin_postal" autocomplete="off"
                                                    id="collection_postcode" placeholder="Collection postcode"
                                                    maxlength="10" required="required" hidden
                                                    class="form-control my-2 py-2 my-2 pcinput trim_input">
                                                <input
                                                    value="<?php echo e(!empty(Session::get('quote_input')['origin_postal']) ? Session::get('quote_input')['origin_postal'] : ''); ?>"
                                                    type="text" disabled autocomplete="off" id="collection_postcode"
                                                    placeholder="Collection postcode" maxlength="10" required="required"
                                                    class="form-control my-2 py-2 my-2 pcinput trim_input">
                                                <input type="button" value="Search" id="btnOriginPostcode"
                                                    onclick="getPostCode('origin')" />
                                            </div>
                                        </div>

                                        <br> <!----> <br>
                                        <h3>Collection Information</h3>
                                        <div class="form-group clearfix">
                                            <label for="collection_onsite_telephone"
                                                class="control-label col-sm-12 col-xs-12 is-error-field"> Onsite Telephone:
                                            </label>
                                            <div class="col-xs-12 col-sm-12">
                                                <input name="origin_contact_phone"
                                                    value="<?php echo e(Auth::User()->contact_phone_no); ?>" type="number"
                                                    id="collection_onsite_telephone"
                                                    placeholder="Onsite Contact Telephone" autocomplete="nope"
                                                    required="required" maxlength="20" pattern=""
                                                    class="form-control my-2 py-2 my-2 input_error"
                                                    ontouchend="toggleVisibilityWithDelay(this)"
                                                    onkeyup="toggleVisibilityWithDelay(this)">
                                                <p id="collection_onsite_telephone-p" class="hidden"
                                                    onclick="editEmail(this)">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="collection_onsite_contact"
                                                class="control-label col-sm-12 col-xs-12 is-error-field"> Contact Name:
                                            </label>
                                            <div class="col-xs-12 col-sm-12">
                                                <input name="origin_contact_name" type="text"
                                                    value="<?php echo e(Auth::User()->contact_first_name . ' ' . Auth::User()->contact_last_name); ?>"
                                                    id="collection_onsite_contact_1" placeholder="Onsite Contact Name"
                                                    autocomplete="nope" required="required" maxlength="40"
                                                    class="form-control my-2 py-2 my-2 input_error"
                                                    ontouchend="toggleVisibilityWithDelay(this)"
                                                    onkeyup="toggleVisibilityWithDelay(this)">
                                                <p id="collection_onsite_contact_1-p" class="hidden"
                                                    onclick="editEmail(this)">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="collection_onsite_contact"
                                                class="control-label col-sm-12 col-xs-12 is-error-field"> Contact Email:
                                            </label>
                                            <div class="col-xs-12 col-sm-12">
                                                <input name="origin_contact_email" type="text"
                                                    value="<?php echo e(Auth::User()->contact_email); ?>"
                                                    id="collection_onsite_contact_2" placeholder="Onsite Contact Name"
                                                    autocomplete="nope" required="required" maxlength="40"
                                                    class="form-control my-2 py-2 my-2 input_error"
                                                    ontouchend="toggleVisibilityWithDelay(this)"
                                                    onkeyup="toggleVisibilityWithDelay(this)">
                                                <p id="collection_onsite_contact_2-p" class="hidden"
                                                    onclick="editEmail(this)">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="collection_notes2" class="control-label col-xs-12"> Collection
                                                Driver Notes:<span class="emnote">Avoid timed requests.</span></label>
                                            <div class="col-xs-12 col-sm-12">
                                                <textarea name ="collection_note" id="collection_notes2"
                                                    placeholder="Notes are for driver only, not monitored by support. Include access restrictions; no time-sensitive requests. For small vehicle, tick below."
                                                    class="form-control my-2 py-2 my-2" ontouchend="toggleVisibilityWithDelay(this)"
                                                    onkeyup="toggleVisibilityWithDelay(this)">
                                            </textarea>
                                                <p id="collection_notes2-p" class="hidden" onclick="editEmail(this)">
                                                </p>

                                                <div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12 collection_side_r">
                                <div class="row form-pad">
                                    <div class="delivery_address">
                                        <div>
                                        </div>
                                        <div style="height: 20px;">
                                            <!---->
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="delivery_address1"
                                                class="control-label col-sm-12 col-xs-12 is-error-field">
                                                <b> Deliver To:</b>
                                                <div class="emnote">Enter company name if commercial.</div>
                                            </label>
                                            <div class="col-xs-12 col-sm-12">
                                                <input type="text" autocomplete="901038447off" id="delivery_address1"
                                                    name="ship_to_name" placeholder="Company Name" maxlength="100"
                                                    required="required" class="form-control my-2 py-2 my-2 input_error"
                                                    ontouchend="toggleVisibilityWithDelay(this)"
                                                    onkeyup="toggleVisibilityWithDelay(this)">
                                                <p id="delivery_address1-p" class="hidden" onclick="editEmail(this)">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="col-xs-12 col-sm-12">
                                                <input type="text" autocomplete="597576816off" id="delivery_address2"
                                                    name="ship_to_address_1" placeholder="Address Line 2" maxlength="100"
                                                    required="required"
                                                    class="form-control my-2 py-2 my-2 form-control my-2 py-2 my-2 input_error"
                                                    ontouchend="toggleVisibilityWithDelay(this)"
                                                    onkeyup="toggleVisibilityWithDelay(this)">
                                                <p id="delivery_address2-p" class="hidden" onclick="editEmail(this)">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="col-xs-12 col-sm-12">
                                                <input type="text" autocomplete="228112186off"
                                                    placeholder="Address Line 3" name="ship_to_address_2"
                                                    id="ship_to_address_2" maxlength="40"
                                                    class="form-control my-2 py-2 my-2"
                                                    ontouchend="toggleVisibilityWithDelay(this)"
                                                    onkeyup="toggleVisibilityWithDelay(this)">
                                                <p id="ship_to_address_2-p" class="hidden" onclick="editEmail(this)">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="col-xs-12 col-sm-12">
                                                <input type="text" autocomplete="381641588off"
                                                    placeholder="City / Town" name="ship_to_city" id="ship_to_city"
                                                    maxlength="40" class="form-control my-2 py-2 my-2"
                                                    ontouchend="toggleVisibilityWithDelay(this)"
                                                    onkeyup="toggleVisibilityWithDelay(this)">
                                                <p id="ship_to_city-p" class="hidden" onclick="editEmail(this)">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="collection_postcode" class="control-label col-sm-12 col-xs-12">
                                                Country: </label>
                                            <div class="col-xs-12 col-sm-12">
                                                <input disabled
                                                    value="<?php echo e(!empty(Session::get('quote_input')['country']) ? Session::get('quote_input')['country'] : ''); ?>"
                                                    autocomplete="612638273off" type="text" placeholder="County"
                                                    maxlength="40" class="form-control my-2 py-2 my-2 ">
                                                <input hidden name="country"
                                                    value="<?php echo e(!empty(Session::get('quote_input')['country']) ? Session::get('quote_input')['country'] : ''); ?>"
                                                    autocomplete="612638273off" type="text" placeholder="County"
                                                    maxlength="40" class="form-control my-2 py-2 my-2 ">
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="delivery_postcode" class="control-label col-sm-12 col-xs-12">
                                                Postcode: </label>
                                            <div class="col-xs-12 col-sm-12  delivery_postcode">
                                                <input hidden name="postal"
                                                    value="<?php echo e(!empty(Session::get('quote_input')['postal']) ? Session::get('quote_input')['postal'] : ''); ?>"
                                                    type="text" autocomplete="7off" placeholder="Delivery postcode"
                                                    id="delivery_postcode" maxlength="10" required="required"
                                                    class="form-control my-2 py-2 my-2 pcinput trim_input">
                                                <input disabled
                                                    value="<?php echo e(!empty(Session::get('quote_input')['postal']) ? Session::get('quote_input')['postal'] : ''); ?>"
                                                    type="text" autocomplete="7off" placeholder="Delivery postcode"
                                                    id="delivery_postcode" maxlength="10" required="required"
                                                    class="form-control my-2 py-2 my-2 pcinput trim_input">
                                                <input type="button" value="Search" id="btnDestinationPostcode"
                                                    onclick="getPostCode('destination')" />

                                            </div>
                                        </div>
                                        <br> <!----> <br>
                                        <h3>Delivery Information</h3>
                                        <div class="form-group clearfix">
                                            <label for="delivery_onsite_telephone"
                                                class="control-label col-sm-12 col-xs-12 is-error-field"> Onsite Telephone:
                                            </label>
                                            <div class="col-xs-12 col-sm-12">
                                                <input type="number" id="delivery_onsite_telephone"
                                                    placeholder="Onsite Contact Telephone" name="ship_to_phone"
                                                    maxlength="20" autocomplete="11off" required="required"
                                                    class="form-control my-2 py-2 my-2 input_error"
                                                    ontouchend="toggleVisibilityWithDelay(this)"
                                                    onkeyup="toggleVisibilityWithDelay(this)">
                                                <p id="delivery_onsite_telephone-p" class="hidden"
                                                    onclick="editEmail(this)">
                                                </p>

                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="delivery_onsite_contact"
                                                class="control-label col-sm-12 col-xs-12 is-error-field"> Contact Name:
                                            </label>
                                            <div class="col-xs-12 col-sm-12">
                                                <input type="text" id="delivery_onsite_contact_1"
                                                    placeholder="Onsite Contact Name" name="ship_to_reference"
                                                    maxlength="40" autocomplete="10off" required="required"
                                                    class="form-control my-2 py-2 my-2 input_error"
                                                    ontouchend="toggleVisibilityWithDelay(this)"
                                                    onkeyup="toggleVisibilityWithDelay(this)">
                                                <p id="delivery_onsite_contact_1-p" class="hidden"
                                                    onclick="editEmail(this)">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="delivery_onsite_contact"
                                                class="control-label col-sm-12 col-xs-12 is-error-field"> Contact Email:
                                            </label>
                                            <div class="col-xs-12 col-sm-12">
                                                <input type="text" id="delivery_onsite_contact_2"
                                                    placeholder="Onsite Contact Name" name="ship_to_email" maxlength="40"
                                                    autocomplete="10off" required="required"
                                                    class="form-control my-2 py-2 my-2 input_error"
                                                    ontouchend="toggleVisibilityWithDelay(this)"
                                                    onkeyup="toggleVisibilityWithDelay(this)">
                                                <p id="delivery_onsite_contact_2-p" class="hidden"
                                                    onclick="editEmail(this)">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="delivery_notes" class="control-label col-xs-12"> Delivery Driver
                                                Notes:<span class="emnote">Avoid timed requests.</span></label>
                                            <div class="col-xs-12 col-sm-12">
                                                <textarea name="delivery_instructions" id="delivery_notes"
                                                    placeholder="Notes are for driver only, not monitored by support. Include access restrictions; no time-sensitive requests. For small vehicle, tick below."
                                                    class="form-control my-2 py-2 my-2" ontouchend="toggleVisibilityWithDelay(this)"
                                                    onkeyup="toggleVisibilityWithDelay(this)">
                                            </textarea>
                                                <p id="delivery_notes-p" class="hidden" onclick="editEmail(this)">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-start mt-5">
                            <!-- Checkbox and label -->
                            <input type="checkbox" id="termsCheckbox" onclick="openTermsModal()">
                            <label for="termsCheckbox" id="termsLabel" class="ms-2">Accept Terms and Conditions</label>

                        </div>
                        <div class="col-12 d-flex justify-content-between mt-5">
                            <a href="<?php echo e(url()->previous()); ?>"
                                class="btn btn-secondary text-white col-lg-3 col-sm-4 ">Cancel</a>
                            <!-- <button id="generate_label" type="button" class="btn btn-primary text-white col-lg-3 col-sm-10 " style="display:none">Generate Label</button> -->
                            <button disabled id="saveBtn" type="submit"
                                class="btn btn-primary text-white col-lg-3 col-sm-4 ">Save</button>
                            <!-- <button id="editBtn" type="button" class="btn btn-primary text-white col-lg-3 col-sm-10 " style="display:none">Edit</button> -->

                        </div>
                        <!-- Generated Label -->
                        <div id="generatedLabel" className="mt-5" style="display: none;">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Generated Label</h3>
                                </div>
                                <div class="card-body table-responsive">
                                    <a href="#" target="_blank" class="btn btn-outline-primary view-label"> View
                                        Label | <i class="fas fa-download"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

            <!-- Modal -->
            <div class="modal ms-3" id="termsModal" tabindex="-1" role="dialog"
                style="text-align: justify; text-justify: inter-word;">
                <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body" id="termsModalBody" style="overflow-y: scroll">
                            <!-- Insert your terms and conditions content here -->
                            <h5 class="fw-bold">
                                Terms and Conditions
                            </h5>

                            <h6 class="fw-bold">
                                1. Introduction
                            </h6>
                            <p>
                                1.1 These Terms and Conditions govern the use of our shipping label generation services (the
                                "Services") provided by SHIPPINGFLOW, a company registered in United Kingdom (referred to as
                                "we", "us", or "our").
                            </p>
                            <p>
                                1.2 By accessing or using our Services, you agree to be bound by these Terms and Conditions.
                                If you do not agree with any part of these Terms and Conditions, you must not use our
                                Services.
                            </p>
                            <h6 class="fw-bold">
                                2. Definitions
                            </h6>
                            <p>
                                2.1 "User" means any individual or entity accessing or using our Services.
                            </p>
                            <p>
                                2.2 "Shipping Labels" refer to the labels generated through our platform for the purpose of
                                shipping goods.
                            </p>
                            <h6 class="fw-bold">
                                3. Use of Services
                            </h6>
                            <p>
                                3.1 Our Services allow Users to generate shipping labels for their parcels.
                            </p>
                            <p>
                                3.2 Users must provide accurate and complete information when using our Services. We are not
                                liable for any consequences arising from inaccurate or incomplete information provided by
                                the User.
                            </p>
                            <p>
                                3.3 Users are responsible for ensuring that they have the legal right to ship the goods for
                                which they generate shipping labels.
                            </p>
                            <h6 class="fw-bold">
                                4. Account Registration
                            </h6>
                            <p>
                                4.1 Users may be required to register an account with us to access certain features of our
                                Services.
                            </p>
                            <p>
                                4.2 Users must provide accurate and up-to-date information when registering an account.
                                Failure to do so constitutes a breach of these Terms and Conditions.
                            </p>
                            <p>
                                4.3 Users are responsible for maintaining the security of their account credentials and must
                                not share them with any third party. Any unauthorized use of an account must be reported to
                                us immediately.
                            </p>
                            <h6 class="fw-bold">
                                5. Payment
                            </h6>
                            <p>
                                5.1 The pricing for our Services is outlined on our website and is subject to change at our
                                discretion.
                            </p>
                            <p>
                                5.2 Users agree to pay all fees associated with their use of our Services in accordance with
                                our pricing structure.
                            </p>
                            <p>
                                5.3 Payments must be made in the currency specified by us and are non-refundable unless
                                otherwise stated.
                            </p>
                            <h6 class="fw-bold">
                                6. Intellectual Property
                            </h6>
                            <p>
                                6.1 All intellectual property rights in our Services, including but not limited to software,
                                logos, and trademarks, belong to us or our licensors.
                            </p>
                            <p>
                                6.2 Users may not reproduce, distribute, or modify any part of our Services without our
                                prior written consent.
                            </p>
                            <h6 class="fw-bold">
                                7. Limitation of Liability
                            </h6>
                            <p>
                                7.1 To the fullest extent permitted by law, we shall not be liable for any direct, indirect,
                                incidental, special, or consequential damages arising out of or in any way connected with
                                the use of our Services.
                            </p>
                            <h6 class="fw-bold">
                                8. Termination
                            </h6>
                            <p>
                                8.1 We reserve the right to suspend or terminate a User's access to our Services at any time
                                and for any reason without prior notice.
                            </p>
                            <h6 class="fw-bold">
                                9. Governing Law
                            </h6>
                            <p>
                                9.1 These Terms and Conditions shall be governed by and construed in accordance with the
                                laws of England and Wales.
                            </p>
                            <h6 class="fw-bold" id="final-terms">
                                10. Changes to Terms and Conditions
                            </h6>
                            <p>
                                10.1 We reserve the right to amend or update these Terms and Conditions at any time. Users
                                will be notified of any changes, and continued use of our Services constitutes acceptance of
                                the revised Terms and Conditions.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                onclick="closeModalAndDecline()">
                                Decline
                            </button>
                            <button disabled type="button" class="btn btn-primary" data-dismiss="modal"
                                onclick="closeModalAndAccept()">
                                Accept
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                // Get the checkbox and modal elements
                const modal = document.getElementById('termsModal');
                const checkbox = document.getElementById('termsCheckbox');
                const modalBody = document.getElementById('termsModalBody');
                const saveButton = document.getElementById('saveBtn');
                checkbox.addEventListener("click", openTermsModal, false);
                // Add click event listener to the label
                function openTermsModal(event) {
                    // Prevent default action of checkbox click
                    event.preventDefault();
                    // Open the modal
                    console.log("test")
                    $(modal).modal('show');
                    // Uncheck the checkbox (optional)
                    checkbox.checked = false;
                }

                function closeModalAndAccept() {

                    $(modal).modal('hide');
                    checkbox.checked = true;
                    saveButton.disabled = false;
                }

                function closeModalAndDecline() {
                    $(modal).modal('hide');
                    checkbox.checked = false;
                    saveButton.disabled = true;
                }

                // Function to check if the user has scrolled to the bottom of the modal
                function hasScrolledToBottom() {
                    const finalTermsElement = document.getElementById('final-terms');
                    const modalBody = document.querySelector('.modal-body');
                    const modalBodyRect = modalBody.getBoundingClientRect();
                    const finalTermsRect = finalTermsElement.getBoundingClientRect();
                    // Check if the bottom of the final terms element is within the modal body's viewport
                    return finalTermsRect.bottom <= modalBodyRect.bottom;
                }

                // Function to enable/disable the "Accept" button based on scroll position
                function toggleAcceptButton() {
                    const acceptButton = document.querySelector('.modal-footer button.btn-primary');
                    if (hasScrolledToBottom()) {
                        acceptButton.disabled = false;
                    } else {
                        acceptButton.disabled = true;
                    }
                }

                // Event listener for scroll events within the modal body
                document.querySelector('.modal-body').addEventListener('scroll', toggleAcceptButton);
            </script>
        </section>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

    <script>
        let typingTimer;
        const doneTypingInterval = 1000;

        // Function to toggle visibility after a delay
        function toggleVisibilityWithDelay(inputField) {

            clearTimeout(typingTimer);
            typingTimer = setTimeout(() => {
                if (inputField.value.trim().length > 0) {
                    toggleVisibility(inputField);
                }
            }, doneTypingInterval);
        }

        // Function to toggle visibility
        function toggleVisibility(inputField) {
            const pTag = document.getElementById(inputField.id + "-p");
            pTag.innerHTML = inputField.value;
            inputField.classList.add('hidden');
            pTag.classList.remove('hidden');
        }

        // Function to edit email (triggered by clicking on the <p> tag)
        function editEmail(pTag) {
            const inputField = document.getElementById(pTag.id.split("-")[0]);
            inputField.classList.remove('hidden');
            pTag.classList.add('hidden');
            inputField.focus(); // Set focus back to input field for editing
        }
    </script>

    <script>
        function getPostCode(btn) {

            if (btn == 'origin') {
                var input = $("#collection_postcode").val();
            } else {
                var input = $("#delivery_postcode").val();
            }

            var url = "/quotes/postcode/" + input;
            $.ajax({
                url: url,
                success: function(postcode) {
                    console.log('success call -> ', postcode);
                    displayData(postcode, btn);
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log("Error: " + errorThrown);
                }
            });
        }


        //display results on page
        function displayData(postcode, btn) {
            console.log('postcode', postcode);
            for (var index in postcode["result"]) {

                if (btn == 'origin') {
                    $("#origin_address_2").val(postcode["result"]["pfa"]);
                    $("#origin_city").val(postcode["result"]["admin_district"]);
                } else {
                    $("#ship_to_address_2").val(postcode["result"]["pfa"]);
                    $("#ship_to_city").val(postcode["result"]["admin_district"]);
                }

            }

        }



        // $('#generate_label').click(function(e) {
        //    var formData = new FormData($('#quoteForm')[0]);
        //    var $button = $(this);

        //    $.ajax({
        //       url: '/quotes/quote/generate-label',
        //       type: 'POST',
        //       data: formData,
        //       dataType: 'json',
        //       processData: false,
        //       contentType: false,
        //       beforeSend: function() {
        //          // Show loading state
        //          $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
        //          $button.prop('disabled', true);
        //       },
        //       complete: function() {
        //          // Restore the button state
        //          $button.html('Generate Label');
        //          $button.prop('disabled', false);
        //       },
        //       success: function(response) {
        //          removeErrors();

        //          console.log(response)
        //          if (response) {
        //             if (response.status === 400) {
        //                var errorMessage = response.responseJSON.message;
        //                // Display the error message using toastr or any other method
        //                toastr.error(errorMessage);
        //                console.log(response.responseJSON.message)
        //                return;
        //             }
        //             toastr.success("Lable Generated.")
        //             $('.view-label').attr('href', response.uri);
        //             $('#generatedLabel').show();
        //             $('html, body').animate({
        //                scrollTop: $('#generatedLabel').offset().top
        //             }, 200);
        //          }
        //       },
        //       error: function(response) {
        //          console.log(response);

        //          removeErrors();

        //          if (response.status === 422) {
        //             var errors = response.responseJSON.error;
        //             showErrors(errors);
        //          } else {
        //             // Extract the error message from the JSON response or responseText
        //             var errorMessage = response.responseJSON.error;

        //             // Display the error message using toastr or any other method
        //             toastr.error(errorMessage);
        //             console.log(response.responseJSON.error)
        //          }
        //       }



        //    });
        // });


        // function showErrors(errors) {
        //    removeErrors();

        //    for (var field in errors) {
        //       var errorMessage = errors[field][0];
        //       var fieldName = field;
        //       if (fieldName === 'country' || fieldName === 'postal' || fieldName.startsWith('ship_to_') || fieldName.startsWith('origin_')) {
        //          $('[name="' + fieldName + '"]').addClass('is-invalid');
        //          $('[name="' + fieldName + '"]').after('<div class="invalid-feedback">' + errorMessage + '</div>');
        //       } else {
        //          if (Array.isArray(errors[field])) {
        //             var fieldArray = field.split('.');
        //             var fieldName = fieldArray[0] + '[]';
        //             var fieldIndex = fieldArray[1];
        //             $('[name="' + fieldName + '"]:eq(' + fieldIndex + ')').addClass('is-invalid');
        //             $('[name="' + fieldName + '"]:eq(' + fieldIndex + ')').after('<div class="invalid-feedback">' + errorMessage + '</div>');
        //          } else {
        //             $('[name="' + field + '"]').addClass('is-invalid');
        //             $('[name="' + field + '"]').after('<div class="invalid-feedback">' + errorMessage + '</div>');
        //          }
        //       }
        //    }
        // }

        // function removeErrors() {
        //    $('.is-invalid').removeClass('is-invalid');
        //    $('.invalid-feedback').remove();
        //    $('#addressFields .alert').remove();
        // }


        // document.addEventListener('DOMContentLoaded', function() {
        //    const form = document.getElementById('quoteForm');
        //    const saveBtn = document.getElementById('saveBtn');
        //    const editBtn = document.getElementById('editBtn');
        //    const generateLabel = document.getElementById('generate_label');
        //    // Save button click event
        //    saveBtn.addEventListener('click', function() {
        //       if (validateForm()) {
        //          saveFormData();
        //          toggleReadOnly(true);
        //          saveBtn.style.display = 'none';
        //          editBtn.style.display = 'inline-block';
        //          generateLabel.style.display = 'inline-block';
        //          hideErrorMessages();
        //       } else {
        //          displayErrorMessages();
        //       }
        //    });
        //    // Edit button click event
        //    editBtn.addEventListener('click', function() {
        //       toggleReadOnly(false);
        //       saveBtn.style.display = 'inline-block';
        //       editBtn.style.display = 'none';
        //       generateLabel.style.display = 'none';
        //    });
        //    // Function to save form data
        //    function saveFormData() {
        //       const inputs = form.querySelectorAll('input, textarea');
        //       inputs.forEach(input => {
        //          input.setAttribute('readonly', true);
        //       });

        //    }
        //    // Function to toggle readonly attribute
        //    function toggleReadOnly(value) {
        //       const inputs = form.querySelectorAll('input, textarea');
        //       inputs.forEach(input => {
        //          input.readOnly = value;
        //       });

        //    }

        //    function validateForm() {
        //      let isValid = true;
        //      const requiredInputs = form.querySelectorAll('input[required], textarea[required]');
        //      requiredInputs.forEach(input => {
        //          if (input.value.trim() === '') {
        //              isValid = false;
        //             //  const errorMessage = input.nextElementSibling;
        //             //  errorMessage.style.display = 'block';
        //             //  input.classList.add('error');
        //          }
        //      });
        //      return isValid;
        //  }

        //    function displayErrorMessages() {
        //       const requiredInputs = form.querySelectorAll('input[required], textarea[required]');
        //       requiredInputs.forEach(input => {
        //          if (input.value.trim() === '') {
        //             // const errorMessage = input.nextElementSibling;
        //             // errorMessage.style.display = 'block';
        //             input.classList.add('error');
        //          }
        //       });
        //    }


        //    function hideErrorMessages() {
        //       // errorMessages.forEach(errorMessage => {
        //       //    errorMessage.style.display = 'none';
        //       // });
        //       const inputs = form.querySelectorAll('input');
        //       inputs.forEach(input => {
        //          input.classList.remove('error');
        //       });
        //    }


        // });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/coukshipflow/public_html/devapp.shipflow.co.uk/resources/views/quotes/get-address.blade.php ENDPATH**/ ?>