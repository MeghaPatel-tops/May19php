<div>
    <ul>
    @if($userrole=='admin')
        <li>Manage Users</li>
    @elseif($userrole=='user')
    <li>View Product</li>
    @else
        <li>Home</li>
    @endif        

    </ul>
</div>
