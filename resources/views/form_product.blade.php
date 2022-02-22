<h1>Form_product</h1>

<form action="{{ route('product.delete') }}" method="post">
	@csrf
	@method('delete')

	<button>Submit form</button>
</form>