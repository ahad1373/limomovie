<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true" data-img="/../../../app-assets/images/backgrounds/04.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row position-relative">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="Chameleon admin logo" src="/../../../app-assets/images/logo/logo.png"/>
                    <h3 class="brand-text">آفتاب پرست</h3></a></li>
            <li class="nav-item d-none d-md-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-disc font-medium-3" data-ticon="ft-disc"></i></a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="navigation-background"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">



                    <li class="{{isActive('admin.')}}"><a class="menu-item" href="{{route('admin.')}}"><i class="ft-home"></i>خانه</a>
                    </li>

            <li class="{{isActive(['admin.categories.index','admin.categories.create','admin.categories.edit'],'menu-open')}} nav-item"><a href=""><i class="ft-server"></i><span class="menu-title" data-i18n="">دسته بندی</span></a>
                <ul class="menu-content">
                    <li class="{{isActive(['admin.categories.index','admin.categories.create','admin.categories.edit'])}}"><a class="menu-item" href="{{route('admin.categories.index')}}">لیست دسته بندی ها</a>
                    </li>
                </ul>
            </li>



            <li class="{{isActive(['admin.users.index','admin.users.create','admin.users.edit'],'menu-open')}} nav-item"><a href=""><i class="ft-users"></i><span class="menu-title" data-i18n="">کاربران</span></a>
                <ul class="menu-content">
                    <li class="{{isActive(['admin.users.index','admin.users.create','admin.users.edit'])}}"><a class="menu-item" href="{{route('admin.users.index')}}">لیست کاربران</a>
                    </li>
                </ul>
            </li>

            <li class="{{isActive(['admin.films.index' , 'admin.films.show', 'admin.films.create' , 'admin.films.edit' , 'admin.films.destroy' , 'admin.films.update'],'menu-open')}} nav-item"><a href=""><i class="ft-monitor"></i><span class="menu-title" data-i18n=""> فیلم ها</span></a>
                <ul class="menu-content">
                    <li class="{{isActive(['admin.films.index'])}}"><a class="menu-item" href="{{route('admin.films.index')}}"> لیست فیلم ها</a>
                    </li>
                </ul>
            </li>

            <li class="{{isActive(['admin.serials.index' , 'admin.serials.show', 'admin.serials.create' , 'admin.serials.edit' , 'admin.serials.destroy' , 'admin.serials.update'],'menu-open')}} nav-item"><a href=""><i class="ft-monitor"></i><span class="menu-title" data-i18n=""> سریال ها</span></a>
                <ul class="menu-content">
                    <li class="{{isActive(['admin.serials.index'])}}"><a class="menu-item" href="{{route('admin.serials.index')}}"> لیست سریال ها</a>
                    </li>
                </ul>
            </li>


            <li class="{{isActive(['admin.comments.index','admin.comments.unapproved'],'menu-open')}} nav-item"><a href=""><i class="ft-layers"></i><span class="menu-title" data-i18n="">نظرات</span></a>
                <ul class="menu-content">
                    <li class="{{isActive('admin.comments.index')}}"><a class="menu-item" href="{{route('admin.comments.index')}}">لیست نظرات تایید شده</a>
                    </li>
                    <li class="{{isActive('admin.comments.unapproved')}}"><a class="menu-item" href="{{route('admin.comments.unapproved')}}">لیست نظرات تایید نشده</a>
                    </li>
                </ul>
            </li>


            <li class="{{isActive(['admin.permissions.index','admin.permissions.create','admin.permissions.edit','admin.roles.index','admin.roles.create','admin.roles.edit'],'menu-open')}} nav-item"><a href=""><i class="ft-server"></i><span class="menu-title" data-i18n="">دسترسی ها</span></a>
                            <ul class="menu-content">
                                    <li class="{{isActive(['admin.permissions.index','admin.permissions.create','admin.permissions.edit'])}}"><a class="menu-item" href="{{route('admin.permissions.index')}}">لیست دسترسی ها</a>
                                    </li>
                                    <li class="{{isActive(['admin.roles.index','admin.roles.create','admin.roles.edit'])}}"><a class="menu-item" href="{{route('admin.roles.index')}}">لیست گروه های دسترسی</a>
                                    </li>
                            </ul>
                        </li>


            <li class="{{isActive(['admin.plans.index' , 'admin.plans.create' , 'admin.plans.edit'],'menu-open')}} nav-item"><a href=""><i class="ft-layers"></i><span class="menu-title" data-i18n=""> پنل اشتراک</span></a>
                <ul class="menu-content">
                    <li class="{{isActive(['admin.updates.index' , 'admin.updates.film'])}}"><a class="menu-item" href="{{route('admin.plans.index')}}">لیست پنل ها</a>
                    </li>
                </ul>
            </li>





            <li class="{{isActive(['admin.updates.index'],'menu-open')}} nav-item"><a href=""><i class="ft-layers"></i><span class="menu-title" data-i18n="">بروز رسانی</span></a>
                <ul class="menu-content">
                    <li class="{{isActive(['admin.updates.index' , 'admin.updates.film'])}}"><a class="menu-item" href="{{route('admin.updates.film')}}"> بروز رسانی فیلم</a>
                    </li>
                    <li class="{{isActive(['admin.updates.index' , 'admin.updates.serial'])}}"><a class="menu-item" href="{{route('admin.updates.serial')}}">بروز رسانی سریال </a>
                    </li>
                </ul>
            </li>







        </ul>
    </div>
</div>
