# (wordpress) hierarchical taxonomies checklist

this wordpress plugin allows hierarchical checklists to be checked up/down the tree

feature list:

 * checks parent when checking a child item
 * on parent selection all childs are selected
 * settings page under tools menu to choose which taxonomies to work with 
 * this can also be used on frontend



to use at the front end  :
```html
the output of wp_terms_checklist must be wrapped in 
<ul id="{termname}checklist" > 
{wp_terms_checklist}
</ul>
```

This is [on GitHub](https://github.com/ash2osh/wp_hirtaxochecklist) so let me know if I've done it  worng somewhere.


thanks to Mr. Ryan Sechrest and his [code](https://ryansechrest.com/2013/03/automatically-check-parent-checkbox-if-child-is-selected-in-wordpress/), from which
the inspiration to this, and some handy implementation hints, came.
