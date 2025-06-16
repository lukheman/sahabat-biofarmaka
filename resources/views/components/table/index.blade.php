@props(['paginate' => null])

<table class="table table-striped">
  <thead>
    <tr>
    {{ $columns }}
    </tr>
  </thead>
  <tbody>
    {{ $rows ?? '' }}
  </tbody>


</table>

<div class="mt-4">
    @if ($paginate)
    {{ $paginate->links() }}

    @endif
</div>
