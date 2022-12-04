@include ('layouts.head') <!--This includes all code from the opening HTML tag through the the opening body tag.-->

@include ('layouts.nav') <!--This includes all code within the nav tag (i.e., the logo and navigation menu).-->

{{ $slot }} <!--This includes all page specific content after the closing header tag through the opening footer tag.-->

@include ('layouts.footer') <!--This includes all content after the opening footer tag through the closing html tag.-->
