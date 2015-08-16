CREATE TABLE ItemSet {
	Id integer(10) AUTO_INCREMENT PRIMARY KEY,
	Name varchar(128) NOT NULL,
	Type varchar(12) NOT NULL DEFAULT 'custom',
	Map varchar(24) NOT NULL DEFAULT 'any',
	Mode varchar(24) NOT NULL DEFAULT 'any'
}

CREATE TABLE ItemBlock {
	Id integer(10) AUTO_INCREMENT PRIMARY KEY,
	Name varchar(50) NOT NULL,
	RecMath BOOLEAN NOT NULL DEFAULT FALSE,
	MinSummonerLevel integer(4) NOT NULL DEFAULT -1,
	MaxSummonerLevel integer(4) NOT NULL DEFAULT -1,
	ShowIfSummonerSpell varchar(24) NOT NULL DEFAULT '',
	HideIfSummonerSpell varchar(24) NOT NULL DEFAULT ''
}

CREATE TABLE BlockWithinItemSet {
	Id_ItemSet integer(10) PRIMARY KEY,
	Id_Block integer(10) PRIMARY KEY,
	FOREIGN KEY (Id_ItemSet) REFERENCES ItemSet(Id),	
	FOREIGN KEY (Id_Block) REFERENCES Block(Id)
}

CREATE TABLE Permalink{
	PermaKey varchar(128) PRIMARY KEY,
	Id_ItemSet integer(10) NOT NULL,
	FOREIGN KEY (Id_ItemSet) REFERENCES ItemSet(Id)
}

CREATE TABLE UserOwnItemSet{
	Id_User integer(11) PRIMARY KEY,
	Id_ItemSet integer(10) PRIMARY KEY,
	FOREIGN KEY (Id_ItemSet) REFERENCES ItemSet(Id),		
	FOREIGN KEY (Id_User) REFERENCES User(Id)
}

CREATE TABLE UserFavItemSet{
	Id_User integer(11) PRIMARY KEY,
	Id_ItemSet integer(10) PRIMARY KEY,
	FOREIGN KEY (Id_ItemSet) REFERENCES ItemSet(Id),
	FOREIGN KEY (Id_User) REFERENCES User(Id)
}

CREATE TABLE BonusStats{
	StatName varchar(32) PRIMARY KEY
}

CREATE TABLE Champion{
	Id integer(10) PRIMARY KEY,
	Name Varchar(32) NOT NULL,
	Title varchar(128) NOT NULL,
	ChampionKey varchar(32) NOT NULL,
	attackrange double NOT NULL DEFAULT 0,
    mpperlevel double NOT NULL DEFAULT 0,
    mp double NOT NULL DEFAULT 0,
    attackdamage double NOT NULL DEFAULT 0,
    hp double NOT NULL DEFAULT 0,
    hpperlevel double NOT NULL DEFAULT 0,
    attackdamageperlevel double NOT NULL DEFAULT 0,
    armor double NOT NULL DEFAULT 0,
    mpregenperlevel double NOT NULL DEFAULT 0,
    hpregen double NOT NULL DEFAULT 0,
    critperlevel double NOT NULL DEFAULT 0,
    spellblockperlevel double NOT NULL DEFAULT 0,
    mpregen double NOT NULL DEFAULT 0,
    attackspeedperlevel double NOT NULL DEFAULT 0,
    spellblock double NOT NULL DEFAULT 0,
    movespeed double NOT NULL DEFAULT 0,
    attackspeedoffset double NOT NULL DEFAULT 0,
    crit double NOT NULL DEFAULT 0,
    hpregenperlevel double NOT NULL DEFAULT 0,
    armorperlevel double NOT NULL DEFAULT 0
}

CREATE TABLE Item{
	Id integer(10) PRIMARY KEY,
	Name varchar(64) NOT NULL,
	Description Text NOT NULL,
	TotalGold integer(10) NOT NULL,
	BaseGold integer(10) NOT NULL
}

CREATE TABLE ItemWithinBlock{
	Id_Item integer(10) PRIMARY KEY,
	Id_Block integer(10) PRIMARY KEY,
	Number integer(4),
	FOREIGN KEY (Id_Item) REFERENCES Item(Id),
	FOREIGN KEY (Id_ItemBlock) REFERENCES ItemBlock(Id)
}

CREATE TABLE Spell {
	SpellKey varchar(32) PRIMARY KEY,
	Name varchar(32) NOT NULL,
	Tooltip text NOT NULL,
	EffectBurn varchar(128) NOT NULL,
	CostBurn varchar(128) NOT NULL,
	Resource varchar(16) NOT NULL,
	RangeBurn varchar(128) NOT NULL,
	CooldownBurn varchar(128) NOT NULL,
}