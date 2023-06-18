CREATE TABLE tx_typo3blog_domain_model_post (
	title varchar(255) NOT NULL DEFAULT '',
	teaser text,
	images int(11) unsigned NOT NULL DEFAULT '0',
	content text,
	categories int(11) unsigned NOT NULL DEFAULT '0',
    slug varchar(255) NOT NULL DEFAULT '',
	keywords varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_typo3blog_domain_model_category (
	name varchar(255) NOT NULL DEFAULT '',
	value varchar(255) NOT NULL DEFAULT ''
);
