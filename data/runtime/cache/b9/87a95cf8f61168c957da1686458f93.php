<?php
//000000000000
 exit();?>
s:413:"SELECT `a`.* FROM `ey_archives` `a` WHERE  (   (a.typeid IN (55,55,56,57,58)  OR CONCAT(',', a.stypeid, ',') LIKE '%,55,%'  OR CONCAT(',', a.stypeid, ',') LIKE '%,56,%'  OR CONCAT(',', a.stypeid, ',') LIKE '%,57,%'  OR CONCAT(',', a.stypeid, ',') LIKE '%,58,%' )  AND a.channel IN (1) AND a.arcrank > -1 AND a.status = 1 AND a.is_del = 0 )  AND `a`.`lang` = 'en' ORDER BY a.sort_order asc, a.add_time desc LIMIT 5";