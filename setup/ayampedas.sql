DROP TABLE IF EXISTS menuList;
CREATE TABLE menuList (
  menu_id int(3) unsigned zerofill auto_increment primary key,
  cat enum('Makanan','Minuman','Camilan') default 'Makanan',
  nama varchar(50) not null,
  harga int(5) not null default '0',
  diskon float(5,2) default '00.00',
  photo tinytext,
  todayMenu enum('0','1') default '0',
  stok int(3) default '0'
);

DROP TABLE IF EXISTS menuDropping;
CREATE TABLE menuDropping(
  dropping_id int(6) auto_increment primary key,
  droppingDate timestamp default current_timestamp(),
  menu_id int(3) unsigned zerofill,
  qty int(3) unsigned
);

DROP TABLE IF EXISTS menuOrder;
CREATE TABLE menuOrder(
  order_id varchar(13) not null unique, -- xx-yymmdd-zzz, where xx = table number , zzz = order day id
  name varchar(30) not null,
  status enum('unpaid','paid') default 'unpaid'
);

DROP TABLE IF EXISTS orderList;
CREATE TABLE orderList(
  orderList_id int(5) unsigned auto_increment primary key,
  order_id varchar(13) not null, -- same as menuOrder.id
  menu_id int(3) unsigned zerofill,
  orderList_status enum('received','delivered') default 'received',
  qty int(3) default '1'
);

CREATE OR REPLACE VIEW billing AS 
SELECT orderList.order_id,menuList.cat,orderList.qty,orderList.orderList_id, 
menuList.nama,(menuList.harga * (1 - menuList.diskon) * orderList.qty) harga 
FROM orderList,menuList 
WHERE menuList.menu_id = orderList.menu_id;

DELIMITER ;;
CREATE TRIGGER menuListStokAdd AFTER INSERT ON menuDropping 
FOR EACH ROW 
BEGIN 
UPDATE menuList SET stok=stok+new.qty WHERE menu_id=new.menu_id; 
END;
;;
DELIMITER ;


DELIMITER ;;
CREATE TRIGGER menuListStokReduce AFTER INSERT ON orderList
FOR EACH ROW 
BEGIN 
UPDATE menuList SET stok=stok-new.qty WHERE menu_id=new.menu_id; 
END;
;;
DELIMITER ;
