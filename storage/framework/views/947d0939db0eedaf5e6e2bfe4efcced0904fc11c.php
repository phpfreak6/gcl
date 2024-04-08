<style>
    .nav_link:hover {
        color: var(--white-color)
    }

    .nav_icon {
        font-size: 1.25rem
    }

    .nav_link {
        display: grid;
        grid-template-columns: max-content max-content;
        align-items: center;
        column-gap: 1rem;
        padding: .5rem 0 .5rem 1.5rem
    }

    @import  url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

    :root {
        --header-height: 3rem;
        --nav-width: 268px;
        --first-color: #FFFFFF;
        --first-color-light: #000000;
        --white-color: #309cdc;
        --body-font: 'Nunito', sans-serif;
        --normal-font-size: 1rem;
        --z-fixed: 100
    }

    *,
    ::before,
    ::after {
        box-sizing: border-box
    }

    .active {
        color: var(--white-color)
    }


    .support-box {
        background-color: #309cdc;
        border-radius: 10px;
        /* Rounded corners */
        padding: 10px;
        /* Add padding inside the box */
        color: white;
        /* Text color */
    }

    /* Style for the button */
    .chat-button {
        background-color: white;
        color: black !important;
        /* Button text color */
        border: none;
        /* Remove borders */
        border-radius: 10px;
        /* Rounded corners */
        padding: 3px 3px;
        /* Add padding to the button */
        cursor: pointer;
        /* Add pointer cursor on hover */
        font-size: 15px
    }

    /* Style for button on hover */
    .chat-button:hover {
        background-color: black;
        /* Change background color on hover */
        color: white !important;
    }

    .t {
        font-size: 12px;
    }
</style>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <div class="sidebar-logo d-flex  justify-content-center">

        <img src="/images/shipflow.jpg" class="mb-2" alt="" height='80'>

    </div>
    <ul class="sidebar-nav mt-2" id="sidebar-nav">
        <!-- <a href="/user-dashboard" class="nav_link <?php echo e(request()->is('user-dashboard') ? 'active' : ''); ?>">
            <iconify-icon icon="material-symbols:home-outline" class="nav_icon"></iconify-icon>
            <span class="nav_name">Account Dashboard</span>
        </a> -->
        <p style="font-weight: bold;" class="ms-4">Account Management</p>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('quotes')): ?>
        <a class="nav_link <?php echo e(Request::is('quotes*') ? 'active' : ''); ?>" href="<?php echo e(route('quotes')); ?>">
            <iconify-icon class="nav_icon" icon="pepicons-print:menu"></iconify-icon>
            <span class="nav_name">Get Quotes</span>
        </a>
        <?php endif; ?>
        <a href="/bookings" class="nav_link <?php echo e(request()->is('bookings') ? 'active' : ''); ?>">
            <iconify-icon icon="ant-design:schedule-twotone"></iconify-icon>
            <span class="nav_name">Booking</span>
        </a>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pickups')): ?>
        <a href="/pickups" class="nav_link <?php echo e(request()->is('pickups') ? 'active' : ''); ?>">
            <iconify-icon icon="fa6-solid:truck-pickup"></iconify-icon>
            <span class="nav_name">Pickup Request</span>
        </a>
        <?php endif; ?>
        <!-- <a href="/track-package" class="nav_link <?php echo e(request()->is('track-package') ? 'active' : ''); ?>">
            <iconify-icon icon="tabler:history"></iconify-icon>
            <span class="nav_name">Track Package</span>
        </a> -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users')): ?>
        <a href="<?php echo e(route('users.index')); ?>" class="nav_link <?php echo e(Request::is('users*') ? 'active' : ''); ?>">
            <iconify-icon icon="teenyicons:users-outline" class="nav_icon"></iconify-icon>
            <span class="nav_name">Users</span>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users')): ?>
        <a href="<?php echo e(route('couriers.index')); ?>" class="nav_link <?php echo e(Request::is('couriers*') ? 'active' : ''); ?>">
            <iconify-icon icon="mdi:courier-fast" class="nav_icon"></iconify-icon>
            <span class="nav_name">Couriers</span>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users')): ?>
        <a href="<?php echo e(route('courier-services.index')); ?>" class="nav_link <?php echo e(Request::is('courier-services*') ? 'active' : ''); ?>">
            <iconify-icon icon="grommet-icons:services" class="nav_icon"></iconify-icon>
            <span class="nav_name">Courier Services</span>
        </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users')): ?>
        <a href="<?php echo e(route('report')); ?>" class="nav_link <?php echo e(Request::is('report*') ? 'active' : ''); ?>">
            <iconify-icon icon="line-md:document-report" class="nav_icon"></iconify-icon>
            <span class="nav_name">Reports</span>
        </a>
        <?php endif; ?>
        <!-- <a href="#" class="nav_link <?php echo e(request()->is('shipping-guide') ? 'active' : ''); ?>">
            <iconify-icon icon="icon-park-outline:help"></iconify-icon>
            <span class="nav_name">Shipping Guide</span>
        </a> -->
        <!-- <p style="font-weight: bold;" class="ms-4">Payment Management</p>
        <a href="/inovices" class="nav_link <?php echo e(request()->is('inovices') ? 'active' : ''); ?>">
            <iconify-icon icon="iconamoon:invoice-light" class="nav_icon"></iconify-icon>
            <span class="nav_name">Bill/Invoice</span>
        </a>
        <a href="/pay-history" class="nav_link <?php echo e(request()->is('pay-history') ? 'active' : ''); ?>">
            <iconify-icon icon="circum:wallet" class="nav_icon"></iconify-icon>
            <span class="nav_name">Payment History</span>
        </a> -->
    </ul>


    <div class="container-fluid" style="margin-top:50px;">
        <div class="row justify-content-center">
            <div class="col-12 support-box">
                <!-- Support Box -->
                <div class=" col-9">
                    <p><strong>Customer Support</strong></p>
                    <p class="t">Need assistance with your delivery?</p>
                    <button class="chat-button">Chat with Us</button>
                </div>
            </div>
        </div>
    </div>
</aside><!-- End Sidebar--><?php /**PATH D:\xampp\htdocs\devapp.shipflow.co.uk\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>