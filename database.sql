/*
SCHEMA DB StrangeRoyale
users(id, player_tag, name, surname, username, email, password)
cards(id, name, Cost, Health_Shield, Damage, Hit_Speed, Dps, Spawn_Death_Damage, Attack_Range, Spawn_Count)
decks(id, title, user)		
     FK: user -> users(id)
card_deck(deck_id, card_id)
     FK: deck_id -> decks(id)
     FK: card_id -> cards(id)
*/


CREATE TABLE cards(
	id integer primary key,
	Name VARCHAR(64),
	Cost VARCHAR(32),
	Health_Shield VARCHAR(32),
	Damage VARCHAR(32),
	Hit_Speed VARCHAR(32),
	Dps VARCHAR(32),
	Spawn_Death_Damage VARCHAR(32),
	Attack_Range VARCHAR(32),
	Spawn_Count VARCHAR(32)
);

CREATE TABLE users(
	id integer primary key auto_increment,
    player_tag varchar(16) not null unique,
    name varchar(255) not null,
    surname varchar(255) not null,
    username varchar(255) not null,
    email varchar(255) not null unique,
    password varchar(255) not null
);

CREATE TABLE decks(
	id integer primary key auto_increment,
    title varchar(64),
    user integer not null,
    index ind_u (user),
    foreign key (user) references users(id)
);

 CREATE TABLE card_deck(
	deck_id int not null,
    card_id int not null,
    primary key (deck_id, card_id),
    index ind_d (deck_id),
    index ind_u (card_id),
    foreign key (deck_id) references decks(id),
    foreign key (card_id) references cards(id)
);
    




drop table cards;
drop table user;
drop table decks;
drop table card_deck;




INSERT INTO Cards (id, Name, Cost, Health_Shield, Damage, HitSpeed, Dps, Spawn_DeathDamage, AttackRange, SpawnCount)
VALUES 
(26000001, 'Archers', 3, '304', '107', 1.1, '97', '0', '5', 2),
(26000072, 'Archer Queen', 5, '1,000', '225', 1.2, '188', '0', '5', 1),
(28000001, 'Arrows', 3, NULL, '122x3', NULL, NULL, NULL, '4', NULL),
(26000015, 'Baby Dragon', 4, '1,152', '160', 1.5, '107', '0', '3.5', 1),
(26000006, 'Balloon', 5, '1,680', '640', 2, '320', '240(Death)', '0.1(Melee: Short)', 1),
(26000046, 'Bandit', 3, '907', '193', 1, '193', '0', '0.75(Melee: Short)', 1),
(28000015, 'Barbarian Barrel', 2, NULL, '241', NULL, NULL, NULL, '4.5 Range, 2.6 Width', NULL),
(26000008, 'Barbarians', 5, '670', '192', 1.4, '137', '0', '0.7(Melee: Short)', 5),
(27000005, 'Barbarian Hut', 6, 1166, NULL, NULL, NULL, NULL, NULL, 1),
(26000049, 'Bats', 2, '81', '81', 1.3, '62', '0', '1.2(Melee: Medium)', 5),
(26000068, 'Battle Healer', 4, '1,717', '148', 1.5, '98', '0', '1.6(Melee: Long)', 1),
(26000036, 'Battle Ram', 4, '911', '286', NULL, NULL, '0', '0.5(Melee: Short)', 1),
(27000004, 'Bomb Tower', 4, 1356, 222, 1.6, 139, NULL, 6, 1),
(26000013, 'Bomber', 2, '332', '222', 1.8, '123', '0', '4.5', 1),
(26000034, 'Bowler', 5, '2,080', '288', 2.5, '115', '0', '4', 1),
(27000000, 'Cannon', 3, 896, 212, 0.9, 236, NULL, 5.5, 1),
(26000054, 'Cannon Cart', 5, '820(+892)', '212', 1, '212', '0', '5.5', 1),
(28000013, 'Clone', 3, 1, 'cloned card', 'cloned card', 'cloned card', 'cloned card', 'cloned card', 'cloned card'),
(26000027, 'Dark Prince', 4, '1,200(+240)', '248', 1.3, '190', '0', '1.2(Melee: Medium)', 1),
(26000040, 'Dart Goblin', 3, '260', '131', 0.7, '187', '0', '6.5', 1),
(28000014, 'Earthquake', 3, NULL, '82x3(287 to Buildings)', NULL, NULL, NULL, '3.5', NULL),
(26000063, 'Electro Dragon', 5, '950', '192(x3)', 2.1, '91(x3)', '0', '3.5', 1),
(26000085, 'Electro Giant', 7, '3,536', '163', 2.1, '77', '0', '1.2(Melee: Medium)', 1),
(26000084, 'Electro Spirit', 1, '230', '99', NULL, NULL, '0', '2.5', 1),
(26000042, 'Electro Wizard', 4, '713', '110(x2)', 1.8, '122', '192(Spawn)', '5', 1),
(26000043, 'Elite Barbarians', 6, '1,341', '384', 1.4, '274', '0', '1.2(Melee: Medium)', 2),
(27000007, 'Elixir Collector', 6, 1070, NULL, NULL, NULL, NULL, NULL, 1),
(26000067, 'Elixir Golem', 3, '1,441', '254', 1.1, '195', '0', '0.75(Melee: Short)', 1),
(26000045, 'Executioner', 5, '1,280', '169(x2)', 2.4, '141', '0', '4.5 (Projectile 6.5)', 1),
(28000000, 'Fireball', 4, NULL, '689', NULL, NULL, NULL, '2.5', NULL),
(26000064, 'Firecracker', 3, '304', '64(x5)', 3, '107', '0', '6 (Projectile 11.5)', 1),
(26000031, 'Fire Spirit', 1, '230', '227', NULL, NULL, '0', '2.5', 1),
(26000061, 'Fisherman', 3, '871', '193', 1.3, '148', '0', '1.2(Melee: Medium)/7', 1),
(26000057, 'Flying Machine', 4, '614', '171', 1.1, '155', '0', '6', 1),
(28000005, 'Freeze', 4, NULL, '115', NULL, NULL, NULL, '3', NULL),
(27000010, 'Furnace', 4, 848, NULL, NULL, NULL, NULL, NULL, 1),
(26000003, 'Giant', 5, '4091', '254', 1.5, '169', '0', '1.2(Melee: Medium)', 1),
(28000017, 'Giant Snowball', 2, NULL, '192', NULL, NULL, NULL, '2.5', NULL),
(26000020, 'Giant Skeleton', 6, '3,600', '267', 1.4, '191', '534 (Death, x2 to towers)', '0.8(Melee: Short)', 1),
(28000004, 'Goblin Barrel', 3, '202', '120', 1.1, '109', '0', '0.5(Melee: Short)', 3),
(27000012, 'Goblin Cage', 4, 742, NULL, NULL, NULL, NULL, NULL, 1),
(27000013, 'Goblin Drill', 4, 1440, NULL, NULL, NULL, NULL, NULL, 1),
(26000041, 'Goblin Gang', 3, '202/133', '120/81', '1.1', '109/48', '0/0', '0.5(Melee: Short)/5', 6),
(26000060, 'Goblin Giant', 6, '3,147', '176', 1.5, '117', '0', '1.2(Melee: Medium)', 1),
(27000001, 'Goblin Hut', 5, 848, NULL, NULL, NULL, NULL, NULL, 1),
(26000002, 'Goblins', 2, '202', '120', 1.1, '109', '0', '0.5(Melee: Short)', 4),
(26000074, 'Golden Knight', 4, '2,000', '160', 0.9, '177', '0', '1.2(Melee: Medium)', 1),
(26000009, 'Golem', 8, '5,120', '312', 2.5, '124', '224(Death)', '0.75(Melee: Short)', 1),
(28000010, 'Graveyard', 5, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(26000025, 'Guards', 3, '81(+240)', '121', 1, '121', '0', '1.6(Melee: Long)', 3),
(26000021, 'Hog Rider', 4, '1,696', '318', 1.6, '198', '0', '0.8(Melee: Short)', 1),
(26000044, 'Hunter', 4, '838', '84(x10)', 2.2, '381', '0', '4', 1),
(28000016, 'Heal Spirit', 1, '231', '110', NULL, NULL, '0', '2.5', 1),
(26000038, 'Ice Golem', 2, '1,197', '84', 2.5, '33', '84(Death)', '0.75(Melee: Short)', 1),
(26000030, 'Ice Spirit', 1, '230', '110', NULL, NULL, '0', '2.5', 1),
(26000023, 'Ice Wizard', 3, '688', '90', 1.7, '53', '84(Spawn)', '5.5', 1),
(26000037, 'Inferno Dragon', 4, '1294', '36-423', 0.4, '90-1057', '0', '3.5', 1),
(27000003, 'Inferno Tower', 5, 1749, '42-848', 0.4, '105-2,120', NULL, 6, 1),
(26000000, 'Knight', 3, '1753', '202', 1.2, '168', '0', '1.2(Melee: Medium)', 1),
(26000029, 'Lava Hound', 7, '3,811', '54', 1.3, '42', '0', '3.5', 1),
(28000007, 'Lightning', 6, NULL, '1056', NULL, NULL, NULL, '3.5', NULL),
(26000035, 'Lumberjack', 4, '1,282', '242', 0.8, '302', '0', '0.7(Melee: Short)', 1),
(26000062, 'Magic Archer', 4, '532', '134', 1.1, '121', '0', '7 (Projectile 11)', 1),
(26000055, 'Mega Knight', 7, '3,993', '268', 1.7, '157', '429(Spawn)', '1.2(Melee: Medium)', 1),
(26000039, 'Mega Minion', 3, '837', '311', 1.6, '194', '0', '1.6(Melee: Long)', 1),
(26000065, 'Mighty Miner', 4, '2,200', '40/200/400', 0.4, '100/500/1000', '334 (Explosive Escape)', '1.6(Melee: Long)', 1),
(26000032, 'Miner', 3, '1,210', '193(58)', 1.2, '160 (48 to Towers)', '0', '1.2(Melee: Medium)', 1),
(26000018, 'Mini P.E.K.K.A', 4, '1,361', '720', 1.8, '450', '0', '0.8(Melee: Short)', 1),
(26000022, 'Minion Horde', 3, '230', '102', 1, '102', '0', '1.6(Melee: Long)', 6),
(26000005, 'Minions', 3, '230', '102', 1, '102', '0', '1.6(Melee: Long)', 3),
(28000006, 'Mirror', 'mirrored card+1', 'mirrored card', 'mirrored card', 'mirrored card', 'mirrored card', 'mirrored card', 'mirrored card', 'mirrored card'),
(26000077, 'Monk', 4, '2,000', '140/420', 0.9, '156', '0', '1.2(Melee: Medium)', 1),
(27000002, 'Mortar', 4, 1472, 266, 5, 53, NULL, '3-11.5', 1),
(26000083, 'Mother Witch', 4, '532', '133', 1.1, '121', '0', '5.5', 1),
(26000014, 'Musketeer', 4, '720', '218', 1, '218', '0', '6', 1),
(26000048, 'Night Witch', 4, '907', '314', 1.5, '209', '0', '1.6(Melee: Long)', 1),
(26000004, 'P.E.K.K.A', 7, '3,760', '816', 1.8, '453', '0', '1.2(Melee: Medium)', 1),
(26000087, 'Phoenix', 4, '1,052', '217', 0.9, '241', '181 (55 to Towers)', '1.6(Melee: Long)', 1),
(28000009, 'Poison', 4, NULL, '91 x8', NULL, NULL, NULL, '3.5', NULL),
(26000016, 'Prince', 5, '1,920', '392', 1.4, '280', '0', '1.6(Melee: Long)', 1),
(26000026, 'Princess', 3, '261', '169', 3, '56', '0', '9', 1),
(28000002, 'Rage', 2, NULL, '192', NULL, NULL, NULL, '3', NULL),
(26000051, 'Ram Rider', 5, '1,767', '266/104', '1.8', '148/95', '0', '0.8(Melee: Short)/5.5', 1),
(26000053, 'Rascals', 5, '1,830', '133', 1.5, '89', '0', '0.8(Melee: Short)', 1),
(28000003, 'Rocket', 6, NULL, '1484', NULL, NULL, NULL, '2', NULL),
(28000018, 'Royal Delivery', 3, NULL, '362', NULL, NULL, NULL, '3', NULL),
(26000050, 'Royal Ghost', 3, '1,210', '261', 1.8, '145', '0', '1.2(Melee: Medium)', 1),
(26000024, 'Royal Giant', 6, '3,072', '307', 1.7, '181', '0', '5', 1),
(26000059, 'Royal Hogs', 5, '837', '74', 1.2, '61', '0', '0.7(Melee: Short)', 4),
(26000047, 'Royal Recruits', 7, '532(+240)', '133', 1.3, '102', '0', '1.6(Melee: Long)', 6),
(26000012, 'Skeleton Army', 3, '81', '81', 1, '81', '0', '0.5(Melee: Short)', 15),
(26000010, 'Skeletons', 1, '81', '81', 1, '81', '0', '0.5(Melee: Short)', 3),
(26000056, 'Skeleton Barrel', 3, '532', '133', NULL, NULL, '133(Death)', '0.35(Melee: Short)', 1),
(26000080, 'Skeleton Dragons', 4, '532', '161', 1.9, '85', '0', '3.5', 2),
(26000069, 'Skeleton King', 4, '2,300', '205', 1.6, '128', '0', '1.2(Melee: Medium)', 1),
(26000033, 'Sparky', 6, '1,452', '1,331', 4, '333', '0', '5', 1),
(26000019, 'Spear Goblins', 2, '133', '81', 1.7, '48', '0', '5', 3),
(27000006, 'Tesla', 4, 1152, 230, 1.2, 191, NULL, 5.5, 1),
(28000011, 'The Log', 2, NULL, '290', NULL, NULL, NULL, '10.1 Range, 3.9 Width', NULL),
(26000028, 'Three Musketeers', 9, '720', '218', 1, '218', '0', '6', 3),
(27000009, 'Tombstone', 3, 530, NULL, NULL, NULL, NULL, NULL, 1),
(28000012, 'Tornado', 3, NULL, '168', NULL, NULL, NULL, '5.5', NULL),
(26000011, 'Valkyrie', 4, '1,908', '267', 1.6, '178', '0', '1.2(Melee: Medium)', 1),
(26000058, 'Wall Breakers', 2, '331', '392', NULL, NULL, '0', '0.5(Melee: Short)', 2),
(26000007, 'Witch', 5, '838', '134', 1.1, '122', '0', '5.5', 1),
(26000017, 'Wizard', 5, '720', '281', 1.4, '201', '0', '5.5', 1),
(27000008, 'X-Bow', 6, 1600, 41, 0.3, 136, NULL, 11.5, 1),
(28000008, 'Zap', 2, NULL, '192', NULL, NULL, NULL, '2.5', NULL),
(26000052, 'Zappies', 4, '530', '116', 2.1, '55', '0', '4.5', 3);

use StrangeRoyale;

drop table users;



SELECT email FROM users WHERE email = 'ale@gmail.com';



SELECT * 
FROM Decks AS d 
INNER JOIN compositions AS c ON d.id = c.deck INNER JOIN card on c.card = card.id
WHERE c.card IN ("26000019","26000020","26000021","26000022","26000023","26000042","26000074","26000085") 
AND d.user = '3' 
GROUP BY d.id
HAVING COUNT(DISTINCT c.card) = 8;

SELECT * 
FROM Deck AS d  INNER JOIN compositions AS c ON d.id = c.deck
where d.user = '3';


select * from deck;
select * from compositions;

start transaction;

delete from deck where id = 3;
delete from compositions where deck = 3;

rollback;
