@if (session()->has('success'))
<div class="fixed top-0 left-1/2 transform -translate-x-1/2 alert alert-primary dark alert-dismissible fade show" role="alert"><strong>Great ! </strong> {{session('success')}}
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
@endif