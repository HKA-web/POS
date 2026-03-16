CREATE TABLE `setup` (
  `kd_setup` char(3) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value1` varchar(255) NULL,
  `value2` integer NULL,
  `active` boolean default true,
  PRIMARY KEY (`kd_setup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `setup` (kd_setup,`key`,value1,value2,active) VALUES
	 ('001','APP_LABEL','GRAFANA',NULL,1),
	 ('002','APP_ADDRESS','JL.MAJU TERUS',NULL,1),
	 ('003','APP_TELP','08564xxxxx',NULL,1);
