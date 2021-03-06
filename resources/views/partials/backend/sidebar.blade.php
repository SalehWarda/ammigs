<div class="side-menu-fixed">
    <div class="scrollbar side-menu-bg">
        <ul class="nav navbar-nav side-menu" id="sidebarnav">
            <!-- menu item Dashboard-->

{{--            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">******* AMMIGS *******</li>--}}


            <li>
                <a href="{{route('admin.dashboard')}}" >
                    <div class="pull-left"><i class="ti-home"></i><span
                            class="right-nav-text">{{trans('dashboard.Home')}}</span></div>
                    <div class="clearfix"></div>
                </a>

            </li>
            <!-- menu title -->
            <!-- menu item Elements-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                    <div class="pull-left"><i class="ti-palette"></i><span
                            class="right-nav-text">{{trans('dashboard.Cover')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>

                    <div class="clearfix"></div>
                </a>
                <ul id="elements" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.covers')}}">{{trans('dashboard.CoverInfo')}}</a></li>
                </ul>
            </li>
            <!-- menu item calendar-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                    <div class="pull-left"><i class="ti-text"></i><span
                            class="right-nav-text">{{trans('dashboard.AboutUs')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.about')}}">{{trans('dashboard.AboutUs')}}</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#product-menu">
                    <div class="pull-left"><i class="ti-shopping-cart"></i><span
                            class="right-nav-text">{{trans('dashboard.Products')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="product-menu" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.products')}}">{{trans('dashboard.Products')}}</a></li>
                </ul>
            </li>



             <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#contact-menu">
                    <div class="pull-left"><i class="ti-email"></i><span
                            class="right-nav-text">{{trans('dashboard.Contacts')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="contact-menu" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.contacts')}}">{{trans('dashboard.Contacts')}}</a></li>
                </ul>
            </li>


             <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#user-menu">
                    <div class="pull-left"><i class="ti-user"></i><span
                            class="right-nav-text">{{trans('dashboard.Users_Management')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="user-menu" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.users')}}">{{trans('dashboard.Users_Management')}}</a></li>
                </ul>
            </li>


            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#settings-menu">
                    <div class="pull-left"><i class="ti-settings"></i><span
                            class="right-nav-text">{{trans('dashboard.Settings')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="settings-menu" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.settings')}}">{{trans('dashboard.Settings')}}</a></li>
                </ul>
            </li>

       <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#service-menu">
                    <div class="pull-left"><i class="ti-files"></i><span
                            class="right-nav-text">{{trans('dashboard.Terms_of_service')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="service-menu" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.services')}}">{{trans('dashboard.Terms_of_service')}}</a></li>
                </ul>
            </li>

              <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#socials-menu">
                    <div class="pull-left"><i class="ti-link"></i><span
                            class="right-nav-text">{{trans('dashboard.Socials')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="socials-menu" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('admin.socials')}}">{{trans('dashboard.Socials')}}</a></li>
                </ul>
            </li>


        </ul>
    </div>
</div>
