<?php
session_start();

include_once('lang/'.$language.'.inc.php');
$_SESSION['errors'] = '';

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';port='.$db_port.';charset=utf8', ''.$db_user.'', ''.$db_pass.''); 
$xi = new PDO('mysql:host='.$db_host.';dbname='.$xi_name.';charset=utf8', ''.$db_user.'', ''.$db_pass.'');

// Character skill IDs (Combat, Ranged, Magic and Crafting)
$skill_ids = array(
  'non' => 2,
  'h2h' => 1,
  'dag' => 2,
  'swd' => 3,
  'gsd' => 4,
  'axe' => 5,
  'gax' => 6,
  'syh' => 7,
  'pol' => 8,
  'kat' => 9,
  'gkt' => 10,
  'clb' => 11,
  'stf' => 12,
  'ame' => 22,
  'ara' => 23,
  'ama' => 24,
  'arc' => 25,
  'mrk' => 26,
  'thr' => 27,
  'grd' => 28,
  'eva' => 29,
  'shl' => 30,
  'par' => 31,
  'div' => 32,
  'hea' => 33,
  'enh' => 34,
  'enf' => 35,
  'ele' => 36,
  'drk' => 37,
  'sum' => 38,
  'nin' => 39,
  'sng' => 40,
  'str' => 41,
  'wnd' => 42,
  'blu' => 43,
  'geo' => 44,
  'hnd' => 45,
  'fsh' => 48,
  'wdw' => 49,
  'smt' => 50,
  'gld' => 51,
  'clt' => 52,
  'lth' => 53,
  'bon' => 54,
  'alc' => 55,
  'cok' => 56,
  'syn' => 57,
  'rid' => 58,
);

// Jobs
$jobs = array(
  0 => '',     // None
  1 => 'war',  // Warrior
  2 => 'mnk',  // Monk
  3 => 'whm',  // White Mage
  4 => 'blm',  // Black Mage
  5 => 'rdm',  // Red mage
  6 => 'thf',  // Thief
  7 => 'pld',  // Paladin
  8 => 'drk',  // Dark Knight
  9 => 'bst',  // Beastmaster
  10 => 'brd', // Bard
  11 => 'rng', // Ranger
  12 => 'sam', // Samurai
  13 => 'nin', // Ninja
  14 => 'drg', // Dragoon
  15 => 'smn', // Summoner
  16 => 'blu', // Blue Mage
  17 => 'cor', // Corsair
  18 => 'pup', // Puppetmaster
  19 => 'dnc', // Dancer
  20 => 'sch', // Scholar
  21 => 'geo', // Geomancer
  22 => 'run', // Rune fencer
);

// Equipment slot IDs
$equipment_ids = array(
  'SLOT_MAIN'	=> 0,
	'SLOT_SUB'	=> 1,
	'SLOT_RANGED'	=> 2,
	'SLOT_AMMO'	=> 3,
	'SLOT_HEAD'	=> 4,
	'SLOT_BODY'	=> 5,
	'SLOT_HANDS'	=> 6,
	'SLOT_LEGS'	=> 7,
	'SLOT_FEET'	=> 8,
	'SLOT_NECK'	=> 9,
	'SLOT_WAIST'	=> 10,
	'SLOT_EAR1'	=> 11,
	'SLOT_EAR2'	=> 12,
	'SLOT_RING1'	=> 13,
	'SLOT_RING2' => 14,
	'SLOT_BACK'	=> 15,
);

// Character titles
$titles = array(
	1 => 'FODDERCHIEF_FLAYER',
	2 => 'WARCHIEF_WRECKER',
	3 => 'DREAD_DRAGON_SLAYER',
	4 => 'OVERLORD_EXECUTIONER',
	5 => 'DARK_DRAGON_SLAYER',
	6 => 'ADAMANTKING_KILLER',
	7 => 'BLACK_DRAGON_SLAYER',
	8 => 'MANIFEST_MAULER',
	9 => 'BEHEMOTHS_BANE',
	10 => 'ARCHMAGE_ASSASSIN',
	11 => 'HELLSBANE',
	12 => 'GIANT_KILLER',
	13 => 'LICH_BANISHER',
	14 => 'JELLYBANE',
	15 => 'BOGEYDOWNER',
	16 => 'BEAKBENDER',
	17 => 'SKULLCRUSHER',
	18 => 'MORBOLBANE',
	19 => 'GOLIATH_KILLER',
	20 => 'MARYS_GUIDE',
	21 => 'SIMURGH_POACHER',
	22 => 'ROC_STAR',
	23 => 'SERKET_BREAKER',
	24 => 'CASSIENOVA',
	25 => 'THE_HORNSPLITTER',
	26 => 'TORTOISE_TORTURER',
	27 => 'MON_CHERRY',
	28 => 'BEHEMOTH_DETHRONER',
	29 => 'THE_VIVISECTOR',
	30 => 'DRAGON_ASHER',
	31 => 'EXPEDITIONARY_TROOPER',
	32 => 'BEARER_OF_THE_WISEWOMANS_HOPE',
	33 => 'BEARER_OF_THE_EIGHT_PRAYERS',
	34 => 'LIGHTWEAVER',
	35 => 'DESTROYER_OF_ANTIQUITY',
	36 => 'SEALER_OF_THE_PORTAL_OF_THE_GODS',
	37 => 'BURIER_OF_THE_ILLUSION',
	39 => 'FAMILY_COUNSELOR',
	41 => 'GREAT_GRAPPLER_SCORPIO',
	42 => 'BOND_FIXER',
	43 => 'VAMPIRE_HUNTER_DMINUS',
	44 => 'SHEEPS_MILK_DELIVERER',
	45 => 'BEAN_CUISINE_SALTER',
	46 => 'TOTAL_LOSER',
	47 => 'DOCTOR_SHANTOTTOS_FLAVOR_OF_THE_MONTH',
	48 => 'PILGRIM_TO_HOLLA',
	49 => 'PILGRIM_TO_DEM',
	50 => 'PILGRIM_TO_MEA',
	51 => 'DAYBREAK_GAMBLER',
	52 => 'THE_PIOUS_ONE',
	53 => 'A_MOSS_KIND_PERSON',
	54 => 'ENTRANCE_DENIED',
	55 => 'APIARIST',
	56 => 'RABBITER',
	57 => 'ROYAL_GRAVE_KEEPER',
	58 => 'COURIER_EXTRAORDINAIRE',
	59 => 'RONFAURIAN_RESCUER',
	60 => 'PICKPOCKET_PINCHER',
	61 => 'FANG_FINDER',
	62 => 'FAITH_LIKE_A_CANDLE',
	63 => 'THE_PURE_ONE',
	64 => 'LOST_CHILD_OFFICER',
	65 => 'SILENCER_OF_THE_LAMBS',
	66 => 'LOST_AMP_FOUND_OFFICER',
	67 => 'GREEN_GROCER',
	68 => 'THE_BENEVOLENT_ONE',
	69 => 'KNIGHT_IN_TRAINING',
	70 => 'LIZARD_SKINNER',
	71 => 'BUG_CATCHER',
	72 => 'SPELUNKER',
	73 => 'ARMS_TRADER',
	74 => 'TRAVELING_MEDICINE_MAN',
	75 => 'CAT_SKINNER',
	76 => 'CARP_DIEM',
	77 => 'ADVERTISING_EXECUTIVE',
	78 => 'THIRDRATE_ORGANIZER',
	79 => 'SECONDRATE_ORGANIZER',
	80 => 'FIRSTRATE_ORGANIZER',
	81 => 'BASTOK_WELCOMING_COMMITTEE',
	82 => 'SHELL_OUTER',
	83 => 'BUCKET_FISHER',
	84 => 'PURSUER_OF_THE_PAST',
	85 => 'PURSUER_OF_THE_TRUTH',
	86 => 'MOMMYS_HELPER',
	87 => 'HOT_DOG',
	88 => 'STAMPEDER',
	89 => 'QIJIS_FRIEND',
	90 => 'QIJIS_RIVAL',
	91 => 'CONTEST_RIGGER',
	92 => 'RINGBEARER',
	93 => 'KULATZ_BRIDGE_COMPANION',
	94 => 'BEADEAUX_SURVEYOR',
	95 => 'AVENGER',
	96 => 'TREASURE_SCAVENGER',
	97 => 'AIRSHIP_DENOUNCER',
	98 => 'ZERUHN_SWEEPER',
	99 => 'TEARJERKER',
	100 => 'CRAB_CRUSHER',
	101 => 'STAR_OF_IFRIT',
	102 => 'SORROW_DROWNER',
	103 => 'BRYGIDAPPROVED',
	104 => 'DRACHENFALL_ASCETIC',
	105 => 'STEAMING_SHEEP_REGULAR',
	106 => 'PURPLE_BELT',
	107 => 'GUSTABERG_TOURIST',
	108 => 'SAND_BLASTER',
	109 => 'BLACK_DEATH',
	111 => 'FRESH_NORTH_WINDS_RECRUIT',
	112 => 'NEW_BEST_OF_THE_WEST_RECRUIT',
	113 => 'NEW_BUUMAS_BOOMERS_RECRUIT',
	114 => 'HEAVENS_TOWER_GATEHOUSE_RECRUIT',
	115 => 'CAT_BURGLAR_GROUPIE',
	116 => 'CRAWLER_CULLER',
	117 => 'SAVIOR_OF_KNOWLEDGE',
	118 => 'STARORDAINED_WARRIOR',
	119 => 'LOWER_THAN_THE_LOWEST_TUNNEL_WORM',
	120 => 'STAR_ONION_BRIGADE_MEMBER',
	121 => 'STAR_ONION_BRIGADIER',
	122 => 'QUICK_FIXER',
	123 => 'FAKEMOUSTACHED_INVESTIGATOR',
	124 => 'HAKKURURINKURUS_BENEFACTOR',
	125 => 'SOB_SUPER_HERO',
	126 => 'EDITORS_HATCHET_MAN',
	127 => 'DOCTOR_SHANTOTTOS_GUINEA_PIG',
	128 => 'SPOILSPORT',
	129 => 'SUPER_MODEL',
	130 => 'GHOSTIE_BUSTER',
	131 => 'NIGHT_SKY_NAVIGATOR',
	132 => 'FAST_FOOD_DELIVERER',
	133 => 'CUPIDS_FLORIST',
	134 => 'TARUTARU_MURDER_SUSPECT',
	135 => 'HEXER_VEXER',
	136 => 'CARDIAN_TUTOR',
	137 => 'DELIVERER_OF_TEARFUL_NEWS',
	138 => 'FOSSILIZED_SEA_FARER',
	139 => 'DOWN_PIPER_PIPEUPPERER',
	140 => 'KISSER_MAKEUPPER',
	141 => 'TIMEKEEPER',
	142 => 'FORTUNETELLER_IN_TRAINING',
	143 => 'TORCHBEARER',
	144 => 'TENSHODO_MEMBER',
	145 => 'CHOCOBO_TRAINER',
	146 => 'BRINGER_OF_BLISS',
	147 => 'ACTIVIST_FOR_KINDNESS',
	148 => 'ENVOY_TO_THE_NORTH',
	149 => 'EXORCIST_IN_TRAINING',
	150 => 'PROFESSIONAL_LOAFER',
	151 => 'CLOCK_TOWER_PRESERVATIONIST',
	152 => 'LIFE_SAVER',
	153 => 'FOOLS_ERRAND_RUNNER',
	154 => 'CARD_COLLECTOR',
	155 => 'RESEARCHER_OF_CLASSICS',
	156 => 'STREET_SWEEPER',
	157 => 'MERCY_ERRAND_RUNNER',
	158 => 'TWOS_COMPANY',
	159 => 'BELIEVER_OF_ALTANA',
	160 => 'TRADER_OF_MYSTERIES',
	161 => 'TRADER_OF_ANTIQUITIES',
	162 => 'TRADER_OF_RENOWN',
	163 => 'BROWN_BELT',
	164 => 'HORIZON_BREAKER',
	165 => 'GOBLINS_EXCLUSIVE_FASHION_MANNEQUIN',
	166 => 'SUMMIT_BREAKER',
	167 => 'SKY_BREAKER',
	168 => 'CLOUD_BREAKER',
	169 => 'STAR_BREAKER',
	170 => 'GREEDALOX',
	171 => 'CERTIFIED_RHINOSTERY_VENTURER',
	172 => 'CORDON_BLEU_FISHER',
	173 => 'ACE_ANGLER',
	174 => 'LU_SHANGLIKE_FISHER_KING',
	175 => 'MATCHMAKER',
	176 => 'ECOLOGIST',
	177 => 'LIL_CUPID',
	178 => 'THE_LOVE_DOCTOR',
	179 => 'SAVIOR_OF_LOVE',
	180 => 'HONORARY_CITIZEN_OF_SELBINA',
	181 => 'PURVEYOR_IN_TRAINING',
	182 => 'ONESTAR_PURVEYOR',
	183 => 'TWOSTAR_PURVEYOR',
	184 => 'THREESTAR_PURVEYOR',
	185 => 'FOURSTAR_PURVEYOR',
	186 => 'FIVESTAR_PURVEYOR',
	187 => 'DOCTOR_YORANORAN_SUPPORTER',
	188 => 'DOCTOR_SHANTOTTO_SUPPORTER',
	189 => 'PROFESSOR_KORUMORU_SUPPORTER',
	190 => 'RAINBOW_WEAVER',
	191 => 'SHADOW_WALKER',
	192 => 'HEIR_TO_THE_HOLY_CREST',
	193 => 'BUSHIDO_BLADE',
	195 => 'PARAGON_OF_PALADIN_EXCELLENCE',
	196 => 'PARAGON_OF_BEASTMASTER_EXCELLENCE',
	197 => 'PARAGON_OF_RANGER_EXCELLENCE',
	198 => 'PARAGON_OF_DARK_KNIGHT_EXCELLENCE',
	199 => 'PARAGON_OF_BARD_EXCELLENCE',
	200 => 'PARAGON_OF_SAMURAI_EXCELLENCE',
	201 => 'PARAGON_OF_DRAGOON_EXCELLENCE',
	202 => 'PARAGON_OF_NINJA_EXCELLENCE',
	203 => 'PARAGON_OF_SUMMONER_EXCELLENCE',
	206 => 'NEW_ADVENTURER',
	207 => 'CERTIFIED_ADVENTURER',
	208 => 'SHADOW_BANISHER',
	209 => 'TRIED_AND_TESTED_KNIGHT',
	210 => 'DARK_SIDER',
	211 => 'THE_FANGED_ONE',
	212 => 'HAVE_WINGS_WILL_FLY',
	213 => 'ANIMAL_TRAINER',
	214 => 'WANDERING_MINSTREL',
	215 => 'MOGS_MASTER',
	216 => 'MOGS_KIND_MASTER',
	217 => 'MOGS_EXCEPTIONALLY_KIND_MASTER',
	218 => 'PARAGON_OF_WARRIOR_EXCELLENCE',
	219 => 'PARAGON_OF_MONK_EXCELLENCE',
	220 => 'PARAGON_OF_RED_MAGE_EXCELLENCE',
	221 => 'PARAGON_OF_THIEF_EXCELLENCE',
	222 => 'PARAGON_OF_BLACK_MAGE_EXCELLENCE',
	223 => 'PARAGON_OF_WHITE_MAGE_EXCELLENCE',
	224 => 'MOGS_LOVING_MASTER',
	226 => 'ROYAL_ARCHER',
	227 => 'ROYAL_SPEARMAN',
	228 => 'ROYAL_SQUIRE',
	229 => 'ROYAL_SWORDSMAN',
	230 => 'ROYAL_CAVALIER',
	231 => 'ROYAL_GUARD',
	232 => 'GRAND_KNIGHT_OF_THE_REALM',
	233 => 'GRAND_TEMPLE_KNIGHT',
	234 => 'RESERVE_KNIGHT_CAPTAIN',
	235 => 'ELITE_ROYAL_GUARD',
	236 => 'LEGIONNAIRE',
	237 => 'DECURION',
	238 => 'CENTURION',
	239 => 'JUNIOR_MUSKETEER',
	240 => 'SENIOR_MUSKETEER',
	241 => 'MUSKETEER_COMMANDER',
	242 => 'GOLD_MUSKETEER',
	243 => 'PRAEFECTUS',
	244 => 'SENIOR_GOLD_MUSKETEER',
	245 => 'PRAEFECTUS_CASTRORUM',
	246 => 'FREESWORD',
	247 => 'MERCENARY',
	248 => 'MERCENARY_CAPTAIN',
	249 => 'COMBAT_CASTER',
	250 => 'TACTICIAN_MAGICIAN',
	251 => 'WISE_WIZARD',
	252 => 'PATRIARCH_PROTECTOR',
	253 => 'CASTER_CAPTAIN',
	254 => 'MASTER_CASTER',
	255 => 'MERCENARY_MAJOR',
	256 => 'FUGITIVE_MINISTER_BOUNTY_HUNTER',
	257 => 'KING_OF_THE_OPOOPOS',
	258 => 'EXCOMMUNICATE_OF_KAZHAM',
	259 => 'KAZHAM_CALLER',
	260 => 'DREAM_DWELLER',
	261 => 'APPRENTICE_SOMMELIER',
	262 => 'DESERT_HUNTER',
	263 => 'SEEKER_OF_TRUTH',
	264 => 'KUFTAL_TOURIST',
	265 => 'THE_IMMORTAL_FISHER_LU_SHANG',
	266 => 'LOOKS_SUBLIME_IN_A_SUBLIGAR',
	267 => 'LOOKS_GOOD_IN_LEGGINGS',
	268 => 'HONORARY_DOCTORATE_MAJORING_IN_TONBERRIES',
	269 => 'TREASUREHOUSE_RANSACKER',
	270 => 'CRACKER_OF_THE_SECRET_CODE',
	271 => 'BLACK_MARKETEER',
	272 => 'ACQUIRER_OF_ANCIENT_ARCANUM',
	273 => 'YA_DONE_GOOD',
	274 => 'HEIR_OF_THE_GREAT_FIRE',
	275 => 'HEIR_OF_THE_GREAT_EARTH',
	276 => 'HEIR_OF_THE_GREAT_WATER',
	277 => 'HEIR_OF_THE_GREAT_WIND',
	278 => 'HEIR_OF_THE_GREAT_ICE',
	279 => 'HEIR_OF_THE_GREAT_LIGHTNING',
	280 => 'GUIDER_OF_SOULS_TO_THE_SANCTUARY',
	281 => 'BEARER_OF_BONDS_BEYOND_TIME',
	282 => 'FRIEND_OF_THE_OPOOPOS',
	283 => 'HERO_ON_BEHALF_OF_WINDURST',
	284 => 'VICTOR_OF_THE_BALGA_CONTEST',
	285 => 'GULLIBLES_TRAVELS',
	286 => 'EVEN_MORE_GULLIBLES_TRAVELS',
	287 => 'HEIR_OF_THE_NEW_MOON',
	288 => 'ASSASSIN_REJECT',
	289 => 'BLACK_BELT',
	290 => 'VERMILLION_VENTURER',
	291 => 'CERULEAN_SOLDIER',
	292 => 'EMERALD_EXTERMINATOR',
	293 => 'GUIDING_STAR',
	294 => 'VESTAL_CHAMBERLAIN',
	295 => 'SAN_DORIAN_ROYAL_HEIR',
	296 => 'HERO_AMONG_HEROES',
	297 => 'DYNAMISSAN_DORIA_INTERLOPER',
	298 => 'DYNAMISBASTOK_INTERLOPER',
	299 => 'DYNAMISWINDURST_INTERLOPER',
	300 => 'DYNAMISJEUNO_INTERLOPER',
	301 => 'DYNAMISBEAUCEDINE_INTERLOPER',
	302 => 'DYNAMISXARCABARD_INTERLOPER',
	303 => 'DISCERNING_INDIVIDUAL',
	304 => 'VERY_DISCERNING_INDIVIDUAL',
	305 => 'EXTREMELY_DISCERNING_INDIVIDUAL',
	306 => 'ROYAL_WEDDING_PLANNER',
	307 => 'CONSORT_CANDIDATE',
	308 => 'OBSIDIAN_STORM',
	309 => 'PENTACIDE_PERPETRATOR',
	310 => 'WOOD_WORSHIPER',
	311 => 'LUMBER_LATHER',
	312 => 'ACCOMPLISHED_CARPENTER',
	313 => 'ANVIL_ADVOCATE',
	314 => 'FORGE_FANATIC',
	315 => 'ACCOMPLISHED_BLACKSMITH',
	316 => 'TRINKET_TURNER',
	317 => 'SILVER_SMELTER',
	318 => 'ACCOMPLISHED_GOLDSMITH',
	319 => 'KNITTING_KNOWITALL',
	320 => 'LOOM_LUNATIC',
	321 => 'ACCOMPLISHED_WEAVER',
	322 => 'FORMULA_FIDDLER',
	323 => 'POTION_POTENTATE',
	324 => 'ACCOMPLISHED_ALCHEMIST',
	325 => 'BONE_BEAUTIFIER',
	326 => 'SHELL_SCRIMSHANDER',
	327 => 'ACCOMPLISHED_BONEWORKER',
	328 => 'HIDE_HANDLER',
	329 => 'LEATHER_LAUDER',
	330 => 'ACCOMPLISHED_TANNER',
	331 => 'FASTRIVER_FISHER',
	332 => 'COASTLINE_CASTER',
	333 => 'ACCOMPLISHED_ANGLER',
	334 => 'GOURMAND_GRATIFIER',
	335 => 'BANQUET_BESTOWER',
	336 => 'ACCOMPLISHED_CHEF',
	337 => 'FINE_TUNER',
	338 => 'FRIEND_OF_THE_HELMED',
	339 => 'TAVNAZIAN_SQUIRE',
	340 => 'DUCAL_DUPE',
	341 => 'HYPER_ULTRA_SONIC_ADVENTURER',
	342 => 'ROD_RETRIEVER',
	343 => 'DEED_VERIFIER',
	344 => 'CHOCOBO_LOVE_GURU',
	345 => 'PICKUP_ARTIST',
	346 => 'TRASH_COLLECTOR',
	347 => 'ANCIENT_FLAME_FOLLOWER',
	348 => 'TAVNAZIAN_TRAVELER',
	349 => 'TRANSIENT_DREAMER',
	350 => 'THE_LOST_ONE',
	351 => 'TREADER_OF_AN_ICY_PAST',
	352 => 'BRANDED_BY_LIGHTNING',
	353 => 'SEEKER_OF_THE_LIGHT',
	354 => 'DEAD_BODY',
	355 => 'FROZEN_DEAD_BODY',
	356 => 'DREAMBREAKER',
	357 => 'MIST_MELTER',
	358 => 'DELTA_ENFORCER',
	359 => 'OMEGA_OSTRACIZER',
	360 => 'ULTIMA_UNDERTAKER',
	361 => 'ULMIAS_SOULMATE',
	362 => 'TENZENS_ALLY',
	363 => 'COMPANION_OF_LOUVERANCE',
	364 => 'TRUE_COMPANION_OF_LOUVERANCE',
	365 => 'PRISHES_BUDDY',
	366 => 'NAGMOLADAS_UNDERLING',
	367 => 'ESHANTARLS_COMRADE_IN_ARMS',
	368 => 'THE_CHEBUKKIS_WORST_NIGHTMARE',
	369 => 'BROWN_MAGE_GUINEA_PIG',
	370 => 'BROWN_MAGIC_BYPRODUCT',
	371 => 'BASTOKS_SECOND_BEST_DRESSED',
	372 => 'ROOKIE_HERO_INSTRUCTOR',
	373 => 'GOBLIN_IN_DISGUISE',
	374 => 'APOSTATE_FOR_HIRE',
	375 => 'TALKS_WITH_TONBERRIES',
	376 => 'ROOK_BUSTER',
	377 => 'BANNERET',
	378 => 'GOLD_BALLI_STAR',
	379 => 'MYTHRIL_BALLI_STAR',
	380 => 'SILVER_BALLI_STAR',
	381 => 'BRONZE_BALLI_STAR',
	382 => 'SEARING_STAR',
	383 => 'STRIKING_STAR',
	384 => 'SOOTHING_STAR',
	385 => 'SABLE_STAR',
	386 => 'SCARLET_STAR',
	387 => 'SONIC_STAR',
	388 => 'SAINTLY_STAR',
	389 => 'SHADOWY_STAR',
	390 => 'SAVAGE_STAR',
	391 => 'SINGING_STAR',
	392 => 'SNIPING_STAR',
	393 => 'SLICING_STAR',
	394 => 'SNEAKING_STAR',
	395 => 'SPEARING_STAR',
	396 => 'SUMMONING_STAR',
	397 => 'PUTRID_PURVEYOR_OF_PUNGENT_PETALS',
	398 => 'UNQUENCHABLE_LIGHT',
	399 => 'BALLISTAGER',
	400 => 'ULTIMATE_CHAMPION_OF_THE_WORLD',
	401 => 'WARRIOR_OF_THE_CRYSTAL',
	402 => 'INDOMITABLE_FISHER',
	403 => 'AVERTER_OF_THE_APOCALYPSE',
	404 => 'BANISHER_OF_EMPTINESS',
	405 => 'RANDOM_ADVENTURER',
	406 => 'IRRESPONSIBLE_ADVENTURER',
	407 => 'ODOROUS_ADVENTURER',
	408 => 'INSIGNIFICANT_ADVENTURER',
	409 => 'FINAL_BALLI_STAR',
	410 => 'BALLI_STAR_ROYALE',
	411 => 'DESTINED_FELLOW',
	412 => 'ORCISH_SERJEANT',
	413 => 'BRONZE_QUADAV',
	414 => 'YAGUDO_INITIATE',
	415 => 'MOBLIN_KINSMAN',
	416 => 'SIN_HUNTER_HUNTER',
	417 => 'DISCIPLE_OF_JUSTICE',
	418 => 'MONARCH_LINN_PATROL_GUARD',
	419 => 'TEAM_PLAYER',
	420 => 'WORTHY_OF_TRUST',
	421 => 'CONQUEROR_OF_FATE',
	422 => 'BREAKER_OF_THE_CHAINS',
	423 => 'A_FRIEND_INDEED',
	424 => 'HEIR_TO_THE_REALM_OF_DREAMS',
	425 => 'GOLD_HOOK',
	426 => 'MYTHRIL_HOOK',
	427 => 'SILVER_HOOK',
	428 => 'COPPER_HOOK',
	430 => 'DYNAMISVALKURM_INTERLOPER',
	431 => 'DYNAMISBUBURIMU_INTERLOPER',
	432 => 'DYNAMISQUFIM_INTERLOPER',
	433 => 'DYNAMISTAVNAZIA_INTERLOPER',
	434 => 'CONFRONTER_OF_NIGHTMARES',
	435 => 'DISTURBER_OF_SLUMBER',
	436 => 'INTERRUPTER_OF_DREAMS',
	437 => 'SAPPHIRE_STAR',
	438 => 'SURGING_STAR',
	439 => 'SWAYING_STAR',
	440 => 'DARK_RESISTANT',
	441 => 'BEARER_OF_THE_MARK_OF_ZAHAK',
	442 => 'SEAGULL_PHRATRIE_CREW_MEMBER',
	443 => 'PROUD_AUTOMATON_OWNER',
	444 => 'PRIVATE_SECOND_CLASS',
	445 => 'PRIVATE_FIRST_CLASS',
	446 => 'SUPERIOR_PRIVATE',
	447 => 'WILDCAT_PUBLICIST',
	448 => 'ADAMANTKING_USURPER',
	449 => 'OVERLORD_OVERTHROWER',
	450 => 'DEITY_DEBUNKER',
	451 => 'FAFNIR_SLAYER',
	452 => 'ASPIDOCHELONE_SINKER',
	453 => 'NIDHOGG_SLAYER',
	454 => 'MAAT_MASHER',
	455 => 'KIRIN_CAPTIVATOR',
	456 => 'CACTROT_DESACELERADOR',
	457 => 'LIFTER_OF_SHADOWS',
	458 => 'TIAMAT_TROUNCER',
	459 => 'VRTRA_VANQUISHER',
	460 => 'WORLD_SERPENT_SLAYER',
	461 => 'XOLOTL_XTRAPOLATOR',
	462 => 'BOROKA_BELEAGUERER',
	463 => 'OURYU_OVERWHELMER',
	464 => 'VINEGAR_EVAPORATOR',
	465 => 'VIRTUOUS_SAINT',
	466 => 'BYEBYE_TAISAI',
	467 => 'TEMENOS_LIBERATOR',
	468 => 'APOLLYON_RAVAGER',
	469 => 'WYRM_ASTONISHER',
	470 => 'NIGHTMARE_AWAKENER',
	471 => 'CERBERUS_MUZZLER',
	472 => 'HYDRA_HEADHUNTER',
	473 => 'SHINING_SCALE_RIFLER',
	474 => 'TROLL_SUBJUGATOR',
	475 => 'GORGONSTONE_SUNDERER',
	476 => 'KHIMAIRA_CARVER',
	477 => 'ELITE_EINHERJAR',
	478 => 'STAR_CHARIOTEER',
	479 => 'SUN_CHARIOTEER',
	480 => 'SUBDUER_OF_THE_MAMOOL_JA',
	481 => 'SUBDUER_OF_THE_TROLLS',
	482 => 'SUBDUER_OF_THE_UNDEAD_SWARM',
	483 => 'AGENT_OF_THE_ALLIED_FORCES',
	484 => 'SCENIC_SNAPSHOTTER',
	485 => 'BRANDED_BY_THE_FIVE_SERPENTS',
	486 => 'IMMORTAL_LION',
	487 => 'PARAGON_OF_BLUE_MAGE_EXCELLENCE',
	488 => 'PARAGON_OF_CORSAIR_EXCELLENCE',
	489 => 'PARAGON_OF_PUPPETMASTER_EXCELLENCE',
	490 => 'LANCE_CORPORAL',
	491 => 'CORPORAL',
	492 => 'MASTER_OF_AMBITION',
	493 => 'MASTER_OF_CHANCE',
	494 => 'MASTER_OF_MANIPULATION',
	495 => 'OVJANGS_ERRAND_RUNNER',
	496 => 'SERGEANT',
	497 => 'SERGEANT_MAJOR',
	498 => 'KARABABAS_TOUR_GUIDE',
	499 => 'KARABABAS_BODYGUARD',
	500 => 'KARABABAS_SECRET_AGENT',
	501 => 'SKYSERPENT_AGGRANDIZER',
	502 => 'CHIEF_SERGEANT',
	503 => 'APHMAUS_MERCENARY',
	504 => 'NASHMEIRAS_MERCENARY',
	505 => 'CHOCOROOKIE',
	506 => 'SECOND_LIEUTENANT',
	507 => 'GALESERPENT_GUARDIAN',
	508 => 'STONESERPENT_SHOCKTROOPER',
	509 => 'PHOTOPTICATOR_OPERATOR',
	510 => 'SALAHEEMS_RISK_ASSESSOR',
	511 => 'TREASURE_TROVE_TENDER',
	512 => 'GESSHOS_MERCY',
	513 => 'EMISSARY_OF_THE_EMPRESS',
	514 => 'ENDYMION_PARATROOPER',
	515 => 'NAJAS_COMRADEINARMS',
	516 => 'NASHMEIRAS_LOYALIST',
	517 => 'PREVENTER_OF_RAGNAROK',
	518 => 'CHAMPION_OF_AHT_URHGAN',
	519 => 'FIRST_LIEUTENANT',
	520 => 'CAPTAIN',
	521 => 'CRYSTAL_STAKES_CUPHOLDER',
	522 => 'WINNING_OWNER',
	523 => 'VICTORIOUS_OWNER',
	524 => 'TRIUMPHANT_OWNER',
	525 => 'HIGH_ROLLER',
	526 => 'FORTUNES_FAVORITE',
	527 => 'SUPERHERO',
	528 => 'SUPERHEROINE',
	529 => 'BLOODY_BERSERKER',
	530 => 'THE_SIXTH_SERPENT',
	531 => 'ETERNAL_MERCENARY',
	532 => 'SPRINGSERPENT_SENTRY',
	533 => 'SPRIGHTLY_STAR',
	534 => 'SAGACIOUS_STAR',
	535 => 'SCHULTZ_SCHOLAR',
	536 => 'KNIGHT_OF_THE_IRON_RAM',
	537 => 'FOURTH_DIVISION_SOLDIER',
	538 => 'COBRA_UNIT_MERCENARY',
	539 => 'WINDTALKER',
	540 => 'LADY_KILLER',
	541 => 'TROUPE_BRILIOTH_DANCER',
	542 => 'CAIT_SITHS_ASSISTANT',
	543 => 'AJIDOMARUJIDOS_MINDER',
	544 => 'COMET_CHARIOTEER',
	545 => 'MOON_CHARIOTEER',
	546 => 'SANDWORM_WRANGLER',
	547 => 'IXION_HORNBREAKER',
	548 => 'LAMBTON_WORM_DESEGMENTER',
	549 => 'PANDEMONIUM_QUELLER',
	550 => 'DEBASER_OF_DYNASTIES',
	551 => 'DISPERSER_OF_DARKNESS',
	552 => 'ENDER_OF_IDOLATRY',
	553 => 'LUGH_EXORCIST',
	554 => 'ELATHA_EXORCIST',
	555 => 'ETHNIU_EXORCIST',
	556 => 'TETHRA_EXORCIST',
	557 => 'BUARAINECH_EXORCIST',
	558 => 'OUPIRE_IMPALER',
	559 => 'SCYLLA_SKINNER',
	560 => 'ZIRNITRA_WINGCLIPPER',
	561 => 'DAWON_TRAPPER',
	562 => 'KRABKATOA_STEAMER',
	563 => 'ORCUS_TROPHY_HUNTER',
	564 => 'BLOBDINGNAG_BURSTER',
	565 => 'VERTHANDI_ENSNARER',
	566 => 'RUTHVEN_ENTOMBER',
	567 => 'YILBEGAN_HIDEFLAYER',
	568 => 'TORCHBEARER_OF_THE_1ST_WALK',
	569 => 'TORCHBEARER_OF_THE_2ND_WALK',
	570 => 'TORCHBEARER_OF_THE_3RD_WALK',
	571 => 'TORCHBEARER_OF_THE_4TH_WALK',
	572 => 'TORCHBEARER_OF_THE_5TH_WALK',
	573 => 'TORCHBEARER_OF_THE_8TH_WALK',
	574 => 'TORCHBEARER_OF_THE_6TH_WALK',
	575 => 'TORCHBEARER_OF_THE_7TH_WALK',
	576 => 'FURNITURE_STORE_OWNER',
	577 => 'ARMORY_OWNER',
	578 => 'JEWELRY_STORE_OWNER',
	579 => 'BOUTIQUE_OWNER',
	580 => 'APOTHECARY_OWNER',
	581 => 'CURIOSITY_SHOP_OWNER',
	582 => 'SHOESHOP_OWNER',
	583 => 'FISHMONGER_OWNER',
	584 => 'RESTAURANT_OWNER',
	585 => 'ASSISTANT_DETECTIVE',
	586 => 'PROMISING_DANCER',
	587 => 'STARDUST_DANCER',
	588 => 'ELEGANT_DANCER',
	589 => 'DAZZLING_DANCE_DIVA',
	590 => 'FRIEND_OF_LEHKO_HABHOKA',
	591 => 'SUMMA_CUM_LAUDE',
	592 => 'GRIMOIRE_BEARER',
	593 => 'SEASONING_CONNOISSEUR',
	594 => 'FINE_YOUNG_GRIFFON',
	595 => 'BABBANS_TRAVELING_COMPANION',
	596 => 'FELLOW_FORTIFIER',
	597 => 'CHOCOCHAMPION',
	598 => 'TRAVERSER_OF_TIME',
	599 => 'MYTHRIL_MUSKETEER_NO_6',
	600 => 'JEWEL_OF_THE_COBRA_UNIT',
	601 => 'KNIGHT_OF_THE_SWIFTWING_GRIFFIN',
	602 => 'WYRMSWORN_PROTECTOR',
	603 => 'FLAMESERPENT_FACILITATOR',
	604 => 'MAZE_WANDERER',
	605 => 'MAZE_NAVIGATOR',
	606 => 'MAZE_SCHOLAR',
	607 => 'MAZE_ARTISAN',
	608 => 'MAZE_OVERLORD',
	609 => 'SWARMINATOR',
	610 => 'BATTLE_OF_JEUNO_VETERAN',
	611 => 'GRAND_GREEDALOX',
	612 => 'KARAHABARUHAS_RESEARCH_ASSISTANT',
	613 => 'HONORARY_KNIGHT_OF_THE_CARDINAL_STAG',
	614 => 'DETECTOR_OF_DECEPTION',
	615 => 'SILENCER_OF_THE_ECHO',
	616 => 'BESTRIDER_OF_FUTURES',
	617 => 'MOG_HOUSE_HANDYPERSON',
	618 => 'PRESIDENTIAL_PROTECTOR',
	619 => 'THE_MOONS_COMPANION',
	620 => 'ARRESTER_OF_THE_ASCENSION',
	621 => 'HOUSE_AURCHIAT_RETAINER',
	622 => 'WANDERER_OF_TIME',
	623 => 'SMITER_OF_THE_SHADOW',
	624 => 'HEIR_OF_THE_BLESSED_RADIANCE',
	625 => 'HEIR_OF_THE_BLIGHTED_GLOOM',
	626 => 'SWORN_TO_THE_DARK_DIVINITY',
	627 => 'TEMPERER_OF_MYTHRIL',
	628 => 'STAR_IN_THE_AZURE_SKY',
	629 => 'FANGMONGER_FORESTALLER',
	630 => 'VISITOR_TO_ABYSSEA',
	631 => 'FRIEND_OF_ABYSSEA',
	632 => 'WARRIOR_OF_ABYSSEA',
	633 => 'STORMER_OF_ABYSSEA',
	634 => 'DEVASTATOR_OF_ABYSSEA',
	635 => 'HERO_OF_ABYSSEA',
	636 => 'CHAMPION_OF_ABYSSEA',
	637 => 'CONQUEROR_OF_ABYSSEA',
	638 => 'SAVIOR_OF_ABYSSEA',
	639 => 'VANQUISHER_OF_SPITE',
	640 => 'HADHAYOSH_HALTERER',
	641 => 'BRIAREUS_FELLER',
	642 => 'KARKINOS_CLAWCRUSHER',
	643 => 'CARABOSSE_QUASHER',
	644 => 'OVNI_OBLITERATOR',
	645 => 'RUMINATOR_CONFOUNDER',
	646 => 'ECCENTRICITY_EXPUNGER',
	647 => 'FISTULE_DRAINER',
	648 => 'KUKULKAN_DEFANGER',
	649 => 'TURUL_GROUNDER',
	650 => 'BLOODEYE_BANISHER',
	651 => 'SATIATOR_DEPRIVER',
	652 => 'IRATHAM_CAPTURER',
	653 => 'LACOVIE_CAPSIZER',
	654 => 'CHLORIS_UPROOTER',
	655 => 'MYRMECOLEON_TAMER',
	656 => 'GLAVOID_STAMPEDER',
	657 => 'USURPER_DEPOSER',
	658 => 'YAANEI_CRASHER',
	659 => 'KUTHAREI_UNHORSER',
	660 => 'SIPPOY_CAPTURER',
	661 => 'TITLACAUAN_DISMEMBERER',
	662 => 'SMOK_DEFOGGER',
	663 => 'AMHULUK_INUNDATER',
	664 => 'PULVERIZER_DISMANTLER',
	665 => 'DURINN_DECEIVER',
	666 => 'KARKADANN_EXOCULATOR',
	667 => 'ULHUADSHI_DESICCATOR',
	668 => 'ITZPAPALOTL_DECLAWER',
	669 => 'SOBEK_MUMMIFIER',
	670 => 'CIREINCROIN_HARPOONER',
	671 => 'BUKHIS_TETHERER',
	672 => 'SEDNA_TUSKBREAKER',
	673 => 'CLEAVER_DISMANTLER',
	674 => 'EXECUTIONER_DISMANTLER',
	675 => 'SEVERER_DISMANTLER',
	676 => 'LUSCA_DEBUNKER',
	677 => 'TRISTITIA_DELIVERER',
	678 => 'KETEA_BEACHER',
	679 => 'RANI_DECROWNER',
	680 => 'ORTHRUS_DECAPITATOR',
	681 => 'DRAGUA_SLAYER',
	682 => 'BENNU_DEPLUMER',
	683 => 'HEDJEDJET_DESTINGER',
	684 => 'CUIJATENDER_DESICCATOR',
	685 => 'BRULO_EXTINGUISHER',
	686 => 'PANTOKRATOR_DISPROVER',
	687 => 'APADEMAK_ANNIHILATOR',
	688 => 'ISGEBIND_DEFROSTER',
	689 => 'RESHEPH_ERADICATOR',
	690 => 'EMPOUSA_EXPURGATOR',
	691 => 'INDRIK_IMMOLATOR',
	692 => 'OGOPOGO_OVERTURNER',
	693 => 'RAJA_REGICIDE',
	694 => 'ALFARD_DETOXIFIER',
	695 => 'AZDAJA_ABOLISHER',
	696 => 'AMPHITRITE_SHUCKER',
	697 => 'FUATH_PURIFIER',
	698 => 'KILLAKRIQ_EXCORIATOR',
	699 => 'MAERE_BESTIRRER',
	700 => 'WYRM_GOD_DEFIER',
	736 => 'MENDER_OF_WINGS',
	737 => 'CHAMPION_OF_THE_DAWN',
	738 => 'BUSHIN_ASPIRANT',
	739 => 'BUSHIN_RYU_INHERITOR',
	740 => 'TEMENOS_EMANCIPATOR',
	741 => 'APOLLYON_RAZER',
	742 => 'GOLDWING_SQUASHER',
	743 => 'SILAGILITH_DETONATOR',
	744 => 'SURTR_SMOTHERER',
	745 => 'DREYRUK_PREDOMINATOR',
	746 => 'SAMURSK_VITIATOR',
	747 => 'UMAGRHK_MANEMANGLER',
	748 => 'SUPERNAL_SAVANT',
	749 => 'SOLAR_SAGE',
	750 => 'BOLIDE_BARON',
	751 => 'MOON_MAVEN'
);

$faces = array(
  '1a' => 0,
  '1b' => 1,
  '2a' => 2,
  '2b' => 3,
  '3a' => 4,
  '3b' => 5,
  '4a' => 6,
  '4b' => 7,
  '5a' => 8,
  '5b' => 9,
  '6a' => 10,
  '6b' => 11,
  '7a' => 12,
  '7b' => 13,
  '8a' => 14,
  '8b' => 15
);

$races = array(
  '1' => 'Hume',
  '2' => 'Hume',
  '3' => 'Elvaan',
  '4' => 'Elvaan',
  '5' => 'Tarutaru',
  '6' => 'Tarutaru',
  '7' => 'Mithra',
  '8' => 'Galka'
);

?>
