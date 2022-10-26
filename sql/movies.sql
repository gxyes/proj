Create database if not exists moviefever;

use moviefever;

drop table if exists movies;
create table movies (
    Name varchar(255),
    Type varchar(255),
    Tag varchar(255),
    Status varchar(255),
    Region varchar(255),
    Duration int,
    Director varchar(255),
    Characters varchar(255),
    Box float(10, 4),
    Descriptions varchar(255),
    URL varchar(255),
    Trailer varchar(255),
    Likes int, 
    ShowTime varchar(255)
);

drop table if exists actors; 
create table actors (
    Name varchar(255),
    Characters varchar(255),
    Popular int,
    URL varchar(255)
);

drop table if exists directors; 
create table directors (
    Name varchar(255),
    Movie varchar(255),
    URL varchar(255)
);

drop table if exists users; 
create table users (
    Name varchar(255),
    Password varchar(255)
);

insert into movies values ("Weathering With You", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666713838627-f92eaa40b379?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "", 47876, "09 Nov 2022");

insert into movies values ("My Neighbor Totoro", "Animation", "Adventure, Fantasy, Family", "Coming Soon", "Japan", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "", 88989, "08 Dec 2021");

insert into movies values ("HAHA", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1659544623522-73ee0920af32?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDMzfGhtZW52UWhVbXhNfHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=800&q=60", "", 22831, "02 Dec 2015");

insert into movies values ("Weathering With You", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666792529510-9616222246d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80", "", 33128, "03 Oct 2008");

insert into movies values ("Weathering With You", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666713838627-f92eaa40b379?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "", 47756, "09 Nov 2022");

insert into movies values ("My Neighbor Totoro", "Animation", "Adventure, Fantasy, Family", "Coming Soon", "Japan", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "", 88949, "08 Dec 2021");

insert into movies values ("HAHA", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1659544623522-73ee0920af32?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDMzfGhtZW52UWhVbXhNfHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=800&q=60", "", 22231, "02 Dec 2015");

insert into movies values ("Weathering With You", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666792529510-9616222246d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80", "", 33812, "03 Oct 2008");

insert into movies values ("Weathering With You", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666713838627-f92eaa40b379?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "", 14776, "09 Nov 2022");

insert into movies values ("My Neighbor Totoro", "Animation", "Adventure, Fantasy, Family", "Coming Soon", "Japan", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "", 88299, "08 Dec 2021");

insert into movies values ("HAHA", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1659544623522-73ee0920af32?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDMzfGhtZW52UWhVbXhNfHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=800&q=60", "", 22351, "02 Dec 2015");

insert into movies values ("Weathering With You", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666792529510-9616222246d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80", "", 33172, "03 Oct 2008");

insert into directors values ("Makoto Shinkai", "Weathering With You", "");

insert into actors values ("Kotaro Daigo", "Hodaka Morishima", "10", "");
insert into actors values ("Nana Mori", "Hina Amano", "9", "");
insert into actors values ("Shun Oguri", "Keisuke Suga", "9", "");

insert into users values ("xinying", "123");