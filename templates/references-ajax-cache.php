<script>
	$j(function(){
		var tn = 'references';

		/* data for selected record, or defaults if none is selected */
		var data = {
			tenant: { id: '<?php echo $rdata['tenant']; ?>', value: '<?php echo $rdata['tenant']; ?>', text: '<?php echo $jdata['tenant']; ?>' }
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for tenant */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'tenant' && d.id == data.tenant.id)
				return { results: [ data.tenant ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

