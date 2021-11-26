create database Order_processing_System;
use Order_processing_System;
create table customer (
customer_id int not null auto_increment primary key ,
customer_name varchar(255) not null,
city varchar(40)
);
create table `order`(
order_id int not null auto_increment primary key,
order_date datetime null,
customer_id int not null,
foreign key (customer_id) references customer(customer_id) on delete cascade 
);
create table order_item(
order_id int not null ,
item_id int not null,
quantity int ,
foreign key (order_id) references `order`(order_id) ,
primary key (order_id,item_id)
);
create table item (
item_id int not null auto_increment primary key,
unit_price int
);
ALTER TABLE order_item
ADD FOREIGN KEY(item_id)
REFERENCES item(item_id) on delete cascade;
create table shipment(
order_id int not null,
warehouse_id int not null,
ship_date datetime ,
foreign key (order_id) references `order`(order_id) on delete cascade ,
primary key (order_id,warehouse_id)
);
create table warehouse (
warehouse_id int not null auto_increment primary key,
warehouse_city varchar(80)
);
ALTER TABLE shipment
ADD FOREIGN KEY(warehouse_id)
REFERENCES warehouse(warehouse_id) on delete cascade ;

