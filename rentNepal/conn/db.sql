CREATE TABLE users(
		userid int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		useremail varchar(255),
    username varchar(255),
		userpassword varchar(255)
	);
    
  CREATE TABLE category (
  		categoryid int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      	categoryname varchar(255)
  );
    
CREATE TABLE product (
	productid int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productname varchar(255),
    productprice int(50),
    productimage varchar(255),
    categoryid int(6) UNSIGNED,
    FOREIGN KEY (categoryid) REFERENCES category(categoryid)
    order_count int DEFAULT 0
);

CREATE TABLE orders (
	ordersid int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    usertid int(6) UNSIGNED,
    productid int(6) UNSIGNED,
    FOREIGN KEY (userid) REFERENCES users(userid),
    FOREIGN KEY (productid) REFERENCES product(productid)
);

