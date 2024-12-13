
create database quicktira;


create table tenants(
account_id int AUTO_INCREMENT primary key,
fullname varchar(255),
email varchar(255),
username varchar(255),
password varchar(255),
contact varchar(255),
account_type varchar(255),
profile_picture varchar(255),
isRenting varchar(255),
account_status varchar(255)
);


create table landlords(
account_id int AUTO_INCREMENT primary key,
fullname varchar(255),
email varchar(255),
username varchar(255),
password varchar(255),
contact varchar(255),
account_type varchar(255),
profile_picture varchar(255) ,
isRenting varchar(255),
account_status varchar(255)
);



create table convo (
   convo_id int AUTO_INCREMENT PRIMARY key,
   tenant_id int,
   landlord_id int
)


create table post_property(
   post_id int auto_increment primary key,
   landlord_id int,
   post_title varchar(255),
   post_images varchar(255),
   post_price int,
   post_description text,
   post_location varchar(255),
   room_count int,
   bathroom_count int,
   sqr_meters int,
   address varchar(255),
   post_created_at varchar(255),
   post_status varchar(255),
   latitude DECIMAL(20, 15),
   longitude DECIMAL(20, 15)
);


create table property_post_pictures(
    post_id int,
    image_name varchar(255)  
);


create table like_react(
    like_id int AUTO_INCREMENT PRIMARY KEY,
    post_id int,
    user_id int
);

create table favorite(
    favorite_id int AUTO_INCREMENT PRIMARY KEY,
    post_id int,
    user_id int
);


create table admin_feedback(
    message_id int AUTO_INCREMENT PRIMARY KEY,
    message varchar(255),
    sender_fullname varchar(255),
    sender_email varchar(255),
    message_type varchar(255)
);

create table admin_report(
    report_id int AUTO_INCREMENT PRIMARY KEY,
    report_account_id varchar(255),
    report_account_fullname varchar(255),
    post_id varchar(255),
    report_message varchar(255),
    report_reason varchar(255),
    sender_fullname varchar(255),
    report_type varchar(255)
);




CREATE TABLE  tenant_applications (
    apply_id int auto_increment primary key,
    post_id INT NOT NULL,
    landlord_id int,
    tenant_id int,
    tenant_fullname VARCHAR(255) NOT NULL,
    contact_phone VARCHAR(20) NOT NULL,
    contact_email VARCHAR(255) NOT NULL,
    num_occupants INT NOT NULL,
    move_in_date DATE NOT NULL,
    employment_work VARCHAR(255) NOT NULL,
);

CREATE TABLE taken_property(
    property_id int auto_increment primary key,
    post_id INT NOT NULL,
    landlord_id int,
    tenant_id int,
    num_occupants INT NOT NULL,
    move_in_date DATE NOT NULL,
    deadline vachar(255)
);

CREATE TABLE landlord_verification(
    verification_id int auto_increment primary key,
    landlord_id int,
    landlord_name varchar(255),
    verification_image varchar(255)
);
