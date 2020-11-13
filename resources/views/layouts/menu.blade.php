<li class="{{ Request::is('teachers*') ? 'active' : '' }}">
    <a href="{{ route('teachers.index') }}"><i class="fa fa-edit"></i><span>@lang('message.teachers')</span></a>
</li>

<li class="{{ Request::is('pupils*') ? 'active' : '' }}">
    <a href="{{ route('pupils.index') }}"><i class="fa fa-edit"></i><span>@lang('message.pupils')</span></a>
</li>

<li class="{{ Request::is('institutions*') ? 'active' : '' }}">
    <a href="{{ route('institutions.index') }}"><i class="fa fa-edit"></i><span>@lang('message.institutions')</span></a>
</li>

<li class="{{ Request::is('groups*') ? 'active' : '' }}">
    <a href="{{ route('groups.index') }}"><i class="fa fa-edit"></i><span>@lang('message.groups')</span></a>
</li>

{{--<li class="{{ Request::is('communities*') ? 'active' : '' }}">
    <a href="{{ route('communities.index') }}"><i class="fa fa-edit"></i><span>@lang('message.groups')</span></a>
</li>--}}
@if(Auth::user()->role == 'admin')
<li class="treeview menu-open" style="height: auto;">
    <a href="#">
        <i class="fa fa-wrench"></i><span>{{__('message.settings')}}</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu" style="display: block;">
        <li class="{{ Request::is('countries*') ? 'active' : '' }}">
            <a href="{{ route('countries.index') }}"><i class="fa fa-edit"></i><span>@lang('message.countries')</span></a>
        </li>
        <li class="{{ Request::is('regions*') ? 'active' : '' }}">
            <a href="{{ route('regions.index') }}"><i class="fa fa-edit"></i><span>@lang('message.regions')</span></a>
        </li>
        <li class="{{ Request::is('districts*') ? 'active' : '' }}">
            <a href="{{ route('districts.index') }}"><i class="fa fa-edit"></i><span>@lang('message.districts')</span></a>
        </li>
        <li class="{{ Request::is('educationDegrees*') ? 'active' : '' }}">
            <a href="{{ route('educationDegrees.index') }}"><i class="fa fa-edit"></i><span>@lang('message.education_degrees')</span></a>
        </li>
        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>@lang('message.users')</span></a>
        </li>
    </ul>
</li>
@endif
