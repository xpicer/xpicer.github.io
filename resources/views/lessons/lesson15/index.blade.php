@include('lessons.partials.bootstrap')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28-csp/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.1.17/vue-resource.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/nestedSortable/2.0.0/jquery.mjs.nestedSortable.min.js"></script>


<div class="container" id="module">
	<form action="{{ route("lesson15.store") }}" method="POST" role="form" id="form_module">
		{{ csrf_field() }}
		{{-- Unable To use VueJS, too slow --}}
		<input type="hidden" name="action" id="action">
		<input type="text" name="randomtext" class="form-control" v-model="randomtext" v-on:keydown.enter.prevent="onSubmit('add')">
		<br>
		<button type="button" name="action" value="nest" class="btn btn-xs btn-success" v-on:click.prevent="onSave">Save</button>
		<button type="button" class="btn btn-xs btn-danger" v-on:click.prevent="onSubmit('reset')">Reset</button>
	
		<ol class="sortable">
			@foreach($records as $row)
				@include('lessons.lesson15.partial', $row)
			@endforeach
		</ol>
	</form>
</div>
<style type="text/css">
.pointer {
	cursor: pointer;
}
</style>
<script type="text/javascript">
	$(function() {
		Vue.http.headers.common['X-CSRF-TOKEN'] = '{{csrf_token()}}';
		var vm = new Vue({
			el:'#module',
			data:{
				randomtext:'',
			},
			methods:{
				onSubmit: function (action) {
					if(action == 'add' && this.randomtext || action=='reset') {
						$('#action').val(action);
						$('#form_module').submit();
					}
					this.randomtext = '';
				},
				onSave: function () {
					var data = $('.sortable').nestedSortable('toHierarchy');
					this.$http.post('{{ route("lesson15.store") }}',{data:data,action:'nest'}, function(results) {
				    	if(results.success) {
				    		location.reload();
				    	}
				    }).error(function(data) {
				    	console.log(data);
				    });
				},
			},
		});
		$('.sortable').nestedSortable({
            handle: 'div',
            items: 'li',
            toleranceElement: '> div'
        });
	});
</script>