# delete duplicate data from table se_channel_data. you cannot delete data from a table in where clause.
mysql -h*** -u*** -p*** -P3306 -Ddb -e " create table tb20150330 as select id from se_channel_data where id in ( select a.id from se_channel_data a left join(select min(id) as id from se_channel_data where date='20150330' group by sid)b on a.id=b.id where a.date='20150330' and b.id is null)"
mysql -h*** -u*** -p*** -P3306 -Ddb -e "delete from se_channel_data where id not in (select id from tb20150330)"