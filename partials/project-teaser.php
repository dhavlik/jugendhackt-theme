<?php 

// $badge = $project['project_badge'];
// unset($badgeClasses);

// if(!empty($badge)) { 
// 	$badgeClasses = 'badge badge-'.$badge[0];
// }

$categories = $project['project_region'];

$filterClasses = '';
if(!empty($categories)){
	$categories = array_values($categories);

	// build the classes for filtering
	foreach ($categories as $key5 => $category) {
		$filterClasses .= 'filter-me-as-'.$category->slug;
		if( (count($categories) - 1) != $key5) { 
			$filterClasses .= ' '; 
		}
	}
}
?>


<div 
	class 			= "background-panel teaser-item <?php echo $filterClasses; ?>"
	id				= "<?php echo htmlspecialchars($project['id']) ?>"
	jh-project-teaser
	hack-dash-id 	= "<?php echo htmlspecialchars($project['project_hackdash_embed']); ?>"
	you-tube-id  	= "<?php echo htmlspecialchars($project['project_hackdash_embed']); ?>" 
	jh-authors		= "<?php echo htmlspecialchars($project['project_contributors']) ?>"
	jh-links		= "<?php echo htmlspecialchars(json_encode($project['project_links'])) ?>"

>
	<div ng-if = "!ready" class = "loading"> loading ... </div>

	<h2 ng-if = "ready">{{hackDashData.title}}</h2>

	<div 
		class 		= "teaser-wrap" 
		style 		= "{{'background-image:url(https://i.ytimg.com/vi/'+youTubeId+'/hqdefault.jpg)'}}"
		ng-click	= "play()"
	>
		<iframe 
			frameborder	=	"0" 
			height		=	"0"
			width		=	"0"
			allowfullscreen
		></iframe>
	</div>

	<div class = "description">
		{{hackDashData.description}}
	</div>
	<a ng-href ="{{'https://hackdash.org/projects/'+hackDashData._id}}">... mehr auf hackdash</a>



	<div class ="teaser-meta">
	
		<h3 class="project-who">
			Wer: {{jhAuthors}}
		</h3>

		<div class="project-links"> 
			<h3 ng-repeat = " link in jhLinks">
				<a 
					class	= "h3" 
					href	= "{{link.project_links_url}}"
				>
					{{link.project_links_title}}
					{{$last ? '' : ','}}
				</a>
			</h3>
		</div>

	</div>
</div>