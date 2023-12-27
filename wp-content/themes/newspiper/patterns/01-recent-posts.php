<?php
/**
  * Title: Recent Posts
  * Slug: newspiper/recent-posts
  * Categories: newspiper
*/
?>

<!-- wp:group {"align":"wide","className":"recent-posts-pattern","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide recent-posts-pattern"><!-- wp:separator {"align":"wide"} -->
<hr class="wp-block-separator alignwide has-alpha-channel-opacity"/>
<!-- /wp:separator -->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Latest News</h2>
<!-- /wp:heading -->

<!-- wp:separator {"align":"wide"} -->
<hr class="wp-block-separator alignwide has-alpha-channel-opacity"/>
<!-- /wp:separator -->

<!-- wp:spacer {"height":"8px"} -->
<div style="height:8px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:query {"queryId":32,"query":{"perPage":3,"pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"list","columns":3},"layout":{"type":"default"}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:post-featured-image {"isLink":true} /-->

<!-- wp:post-terms {"term":"category","separator":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|text-primary"}}}},"className":"top-meta"} /-->

<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"20px"}},"className":"p-animation-underline"} /-->

<!-- wp:post-author {"showAvatar":false,"byline":"\u003cstrong\u003eby\u003c/strong\u003e","style":{"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"16px"}}} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p>No posts found.</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%","className":"reorder-first"} -->
<div class="wp-block-column reorder-first" style="flex-basis:50%"><!-- wp:query {"queryId":42,"query":{"perPage":"1","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"list"}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:post-terms {"term":"category","textAlign":"center","separator":" ","style":{"elements":{"link":{"color":{"text":"var:preset|color|text-primary"}}}},"className":"top-meta"} /-->

<!-- wp:post-title {"textAlign":"center","level":1,"isLink":true,"className":"p-animation-underline","fontSize":"x-large"} /-->

<!-- wp:post-excerpt {"textAlign":"center","fontSize":"large"} /-->

<!-- wp:post-author {"textAlign":"center","showAvatar":false,"byline":"by","style":{"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"16px"}}} /-->

<!-- wp:post-featured-image {"isLink":true} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p>No posts found.</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:query {"queryId":52,"query":{"perPage":3,"pages":0,"offset":"4","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"list"}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:post-featured-image {"isLink":true} /-->

<!-- wp:post-terms {"term":"category","separator":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|text-primary"}}}},"className":"top-meta"} /-->

<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"20px"}},"className":"p-animation-underline"} /-->

<!-- wp:post-author {"showAvatar":false,"byline":"by","style":{"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"16px"}}} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p>No posts found.</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"32px"} -->
<div style="height:32px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->