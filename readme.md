### Dh_ItemPosition
Small module to provide very basic sorting ability for included head files (css and js) in Magento.

Will be most useful when including items from local.xml but can be used anywhere where the ordering of two or more files is important.

The module requires a rewrite of Mage_Page_Block_Html_Head

### Usage

Three new methods have been added to Mage_Page_Block_Html_Head:

1. setFirstItem - Make an item the first of its parent type (js or css) to be included
2. setLastItem - Make an item the last of its parent type (js or css) to be included
3. setBefore - takes two parameters and ensures that one will always be included before/after the other


```
    <reference name="head">
            <action method="setBefore">
                <before>js/lib/jquery/jquery/jquery-1.8.2.min.js</before>
                <target>js/lib/jquery/depends-on-jquery.js</target>
            </action>
     </reference>

or
     <reference name="head">
            <action method="setFirst">
                <first>js/lib/jquery/jquery/jquery-1.8.2.min.js</first>
            </action>
     </reference>


or

     <reference name="head">
            <action method="setLast">
                <last>js/lib/jquery/depends-on-jquery.js</last>
            </action>
     </reference>

```


### Support or Contact
Direct any feedback to @ddh__ / drewdhunter@gmail.com


### Changelog
1.0.0 Initial commit
1.1.0 Simplified Dh_ItemPosition_Block_Page_Html_Head::before.  Additionally, this now ensures that the before item will always come directly before the after item
