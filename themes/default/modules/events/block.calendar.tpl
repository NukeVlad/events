<!-- BEGIN: main -->
<!-- BEGIN: js -->
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/{BLOCK_JS}/js/{MODULE_FILE}.js"></script>
<!-- END: js -->
<!-- BEGIN: css -->
<link type="text/css" rel="stylesheet" href="{NV_BASE_SITEURL}themes/{BLOCK_CSS}/css/{MODULE_FILE}.css"/>
<!-- END: css -->
<div class="event-calendar mb20 clearfix" id="event-calendar">
	<!-- BEGIN: data -->
	<table>
		<thead>
			<tr>
				<th><a href="#" class="load-ajax" data-url="{AJAX_URL}" data-post="{DATA_PREV}">&laquo;</a></th>
				<th colspan="5">{GLANG.month} {MONTH_TEXT}</th>
				<th><a href="#" class="load-ajax" data-url="{AJAX_URL}" data-post="{DATA_NEXT}">&raquo;</a></th>
			</tr>
		</thead>
		<tbody>
			<tr class="calendar-head">
				<th>{LANG.week_T2}</th>
				<th>{LANG.week_T3}</th>
				<th>{LANG.week_T4}</th>
				<th>{LANG.week_T5}</th>
				<th>{LANG.week_T6}</th>
				<th>{LANG.week_T7}</th>
				<th>{LANG.week_CN}</th>
			</tr>
			<!-- BEGIN: week -->
			<tr>
				<!-- BEGIN: loop --><td class="{DAY.month_class} {DAY.today} {DAY.has_event}">{DAY.title}</td><!-- END: loop -->
			</tr>
			<!-- END: week -->
		</tbody>
	</table>
	<!-- END: data -->
</div>
<div class="mb20 clearfix">
	<a class="btn btn-sm btn-info btn-block mb10" href="{LINK_AFTER}">{LANG.event_future}</a>
	<a class="btn btn-sm btn-success btn-block mb10" href="{LINK_CURRENT}">{LANG.event_now}</a>
	<a class="btn btn-sm btn-danger btn-block mb10" href="{LINK_BEFORE}">{LANG.event_history}</a>
</div>
<!-- END: main -->
