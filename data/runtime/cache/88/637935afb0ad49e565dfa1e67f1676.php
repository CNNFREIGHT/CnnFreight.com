<?php
//000000000000
 exit();?>
s:410:"SELECT `a`.* FROM `ey_archives` `a` WHERE  (   (a.typeid IN (2,2,10,11,37)  OR CONCAT(',', a.stypeid, ',') LIKE '%,2,%'  OR CONCAT(',', a.stypeid, ',') LIKE '%,10,%'  OR CONCAT(',', a.stypeid, ',') LIKE '%,11,%'  OR CONCAT(',', a.stypeid, ',') LIKE '%,37,%' )  AND a.channel IN (1) AND a.arcrank > -1 AND a.status = 1 AND a.is_del = 0 )  AND `a`.`lang` = 'cn' ORDER BY a.sort_order asc, a.add_time desc LIMIT 6";