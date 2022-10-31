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
    Box float(10, 2),
    Descriptions varchar(65532),
    URL varchar(255),
    Trailer varchar(255),
    Likes int, 
    ShowTime varchar(255),
    Price float(10, 2)
);

drop table if exists theatres;
create table theatres (
    Name varchar(255),
    Category varchar(255),
    Special varchar(255), 
    Region varchar(255),
    Service varchar(255),
    Address varchar(255),
    Phone varchar(255),
    URL varchar(255),
    Distance varchar(255)
);

drop table if exists music;
create table music (
    Name varchar(255),
    URL varchar(255),
    Movie varchar(255),
    Singer varchar(255)
);

drop table if exists reviews;
create table reviews (
    Content varchar(65532),
    User varchar(255),
    Movie varchar(255),
    Time varchar(255),
    Likes int
);

drop table if exists actors; 
create table actors (
    Movie varchar(255),
    Name varchar(255),
    Characters varchar(255),
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
    Password varchar(255),
    URL varchar(255)
);

drop table if exists currentuser; 
create table currentuser (
    Name varchar(255),
    Password varchar(255),
    URL varchar(255)
);

drop table if exists movietimetable;
create table movietimetable (
    Date varchar(255),
    Time varchar(255),
    Hall varchar(255),
    Movies varchar(255)
);

drop table if exists movielist; 
create table movielist (
    Name varchar(255),
    Type varchar(255),
    Tag varchar(255),
    Status varchar(255),
    Region varchar(255),
    Duration int,
    Director varchar(255),
    Characters varchar(255),
    Box float(10, 2),
    Descriptions varchar(65532),
    URL varchar(255),
    Trailer varchar(255),
    Likes int, 
    ShowTime varchar(255),
    Price float(10, 2)
);

drop table if exists theatrelist;
create table theatrelist (
    Name varchar(255),
    Category varchar(255),
    Special varchar(255), 
    Region varchar(255),
    Service varchar(255),
    Address varchar(255),
    Phone varchar(255),
    URL varchar(255),
    Distance varchar(255)
);

drop table if exists bookings;
create table bookings (
    Name varchar(255),
    Date varchar(255),
    Price varchar(255), 
    Hall varchar(255),
    Time varchar(255),
    Theatre varchar(255),
    User varchar(255),
    Seat varchar(255)
);

drop table if exists feedback;
create table feedback (
    Feedback varchar(255),
    User varchar(255),
    Time varchar(255)
);


insert into movietimetable values (
    "Today", "10:45", "Hall 5", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Tomorrow", "8:45", "Hall 6", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Tomorrow1", "8:45", "Hall 1", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Tomorrow2", "9:45", "Hall 8", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Today", "11:45", "Hall 7", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Tomorrow", "11:45", "Hall 8", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Tomorrow1", "9:45", "Hall 7", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Tomorrow2", "12:45", "Hall 3", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Today", "12:45", "Hall 12", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Tomorrow", "14:45", "Hall 4", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Tomorrow1", "10:45", "Hall 12", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Tomorrow2", "14:45", "Hall 4", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Today", "15:45", "Hall 13", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Tomorrow", "17:45", "Hall 5", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Tomorrow1", "18:45", "Hall 13", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Tomorrow2", "19:45", "Hall 5", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Today", "15:45", "Hall 12", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Tomorrow", "17:45", "Hall 4", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Tomorrow1", "19:45", "Hall 12", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);
insert into movietimetable values (
    "Tomorrow2", "17:45", "Hall 7", "Weathering With You1, Weathering With You2, Weathering With You3, Weathering With You5, Weathering With You6, Weathering With You7, My Neighbor Totoro1, My Neighbor Totoro3, My Neighbor Totoro4, My Neighbor Totoro5, HAHA, HAHA2, HAHA3"
);

insert into movies values ("Weathering With You1", "Animation", "Love", "Now Showing", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666713838627-f92eaa40b379?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 47876, "09 Nov 2022", "20.6");

insert into movies values ("My Neighbor Totoro1", "romance", "Adventure, Fantasy, Family", "Coming Soon", "China", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 88989, "2020", "20.6");

insert into movies values ("My Neighbor Totoro1", "romance", "Adventure, Fantasy, Family", "Now Showing", "Japan", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 88989, "08 Dec 2020", "20.6");

insert into movies values ("My Neighbor Totoro1", "romance", "Adventure, Fantasy, Family", "Coming Soon", "us", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 88989, "2020", "20.6");

insert into movies values ("My Neighbor Totoro1", "comedy", "Adventure, Fantasy, Family", "Coming Soon", "us", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 88989, "2019", "20.6");


insert into movies values ("My Neighbor Totoro1", "romance", "Adventure, Fantasy, Family", "Coming Soon", "us", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 88989, "2020", "20.6");

insert into movies values ("My Neighbor Totoro1", "comedy", "Adventure, Fantasy, Family", "Coming Soon", "us", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 88989, "2019", "20.6");

insert into movies values ("HAHA", "Animation", "Love", "Now Showing", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1659544623522-73ee0920af32?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDMzfGhtZW52UWhVbXhNfHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=800&q=60", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 22831, "02 Dec 2015", "20.6");

insert into movies values ("Weathering With You2", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666792529510-9616222246d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 33128, "03 Oct 2008", "11.6");

insert into movies values ("Weathering With You3", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666713838627-f92eaa40b379?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 47756, "09 Nov 2022", "20.6");

insert into movies values ("My Neighbor Totoro4", "Animation", "Adventure, Fantasy, Family", "Now Showing", "Japan", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 88949, "08 Dec 2021", "20.6");

insert into movies values ("HAHA2", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1659544623522-73ee0920af32?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDMzfGhtZW52UWhVbXhNfHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=800&q=60", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 22231, "02 Dec 2015", "8.6");

insert into movies values ("Weathering With You5", "Animation", "Love", "Now Showing", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666792529510-9616222246d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 33812, "03 Oct 2008", "9.6");

insert into movies values ("Weathering With You6", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666713838627-f92eaa40b379?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 14776, "09 Nov 2022", "10.6");

insert into movies values ("My Neighbor Totoro3", "Animation", "Adventure, Fantasy, Family", "Coming Soon", "Japan", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 88299, "08 Dec 2021", "8.6");


insert into movies values ("HAHA3", "Animation", "Love", "Now Showing", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1659544623522-73ee0920af32?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDMzfGhtZW52UWhVbXhNfHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=800&q=60", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 22351, "02 Dec 2015", "9.6");

insert into movies values ("Weathering With You7", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666792529510-9616222246d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 33172, "03 Oct 2008", "10.6");

insert into directors values ("Makoto Shinkai", "Weathering With You1", "https://images.unsplash.com/photo-1666621203971-e2b529731169?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80");

insert into actors values ("Weathering With You1", "Kotaro Daigo", "Hodaka Morishima", "https://images.unsplash.com/photo-1657518196243-4f6cc79f69c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80");
insert into actors values ("Weathering With You1", "Nana Mori", "Hina Amano", "https://images.unsplash.com/photo-1665457621448-2d938dba54d6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80");
insert into actors values ("Weathering With You1", "Shun Oguri", "Keisuke Suga", "https://images.unsplash.com/photo-1666153387073-e54cda2c4b38?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80");

insert into music values ("Music1", "https://www.ytmp3.cn/down/78367.mp3", "Weathering With You1", "Singer1");
insert into music values ("Music2", "https://www.ytmp3.cn/down/78367.mp3", "Weathering With You1", "Singer2");

insert into users values ("xinying", "123", "https://images.unsplash.com/photo-1666713838627-f92eaa40b379?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80");
insert into users values ("fuguo", "123", "https://images.unsplash.com/photo-1666153387073-e54cda2c4b38?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80");

insert into reviews values ("The film won a number of awards, including being selected as the Japanese entry for Best International Feature Film at the 92nd Academy Awards. It received four Annie Award nominations, including for Best Independent Animated Feature, tying Spirited Away and Millennium Actress (both 2001) for the most nominations for an anime film at the Annies (until it was surpassed by Hosoda's Belle (2021), with five nominations).",
                            "xinying", "Weathering With You1", "2022-09-11 10:20:08", 3322);
insert into reviews values ("t features the voices of Kotaro Daigo and Nana Mori, with animation direction by Atsushi Tamura, character design by Masayoshi Tanaka, and its orchestral score and soundtrack composed by Radwimps; the latter two previously collaborated with Shinkai on Your Name (2016).",
                            "fuguo", "Weathering With You1", "2022-10-03 19:50:45", 3320);

insert into currentuser values ("Null", "Null", "Null");

insert into movielist values ("Weathering With You1", "Animation", "Love", "Now Showing", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666713838627-f92eaa40b379?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 47876, "09 Nov 2022", "20.6");

insert into movielist values ("My Neighbor Totoro1", "romance", "Adventure, Fantasy, Family", "Coming Soon", "China", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 88989, "2020", "20.6");

insert into movielist values ("My Neighbor Totoro1", "romance", "Adventure, Fantasy, Family", "Now Showing", "Japan", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 88989, "08 Dec 2020", "20.6");


insert into movies values ("HAHA3", "Animation", "Love", "Now Showing", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1659544623522-73ee0920af32?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDMzfGhtZW52UWhVbXhNfHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=800&q=60", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 22351, "02 Dec 2015", "9.6");

insert into movies values ("Weathering With You7", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666792529510-9616222246d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 33172, "03 Oct 2008", "10.6");

insert into directors values ("Makoto Shinkai", "Weathering With You1", "https://images.unsplash.com/photo-1666621203971-e2b529731169?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80");

insert into actors values ("Weathering With You1", "Kotaro Daigo", "Hodaka Morishima", "https://images.unsplash.com/photo-1657518196243-4f6cc79f69c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80");
insert into actors values ("Weathering With You1", "Nana Mori", "Hina Amano", "https://images.unsplash.com/photo-1665457621448-2d938dba54d6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80");
insert into actors values ("Weathering With You1", "Shun Oguri", "Keisuke Suga", "https://images.unsplash.com/photo-1666153387073-e54cda2c4b38?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80");

insert into music values ("Music1", "https://www.ytmp3.cn/down/78367.mp3", "Weathering With You1", "Singer1");
insert into music values ("Music2", "https://www.ytmp3.cn/down/78367.mp3", "Weathering With You1", "Singer2");

insert into users values ("xinying", "123", "https://images.unsplash.com/photo-1666713838627-f92eaa40b379?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80");
insert into users values ("fuguo", "123", "https://images.unsplash.com/photo-1666153387073-e54cda2c4b38?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80");

insert into reviews values ("The film won a number of awards, including being selected as the Japanese entry for Best International Feature Film at the 92nd Academy Awards. It received four Annie Award nominations, including for Best Independent Animated Feature, tying Spirited Away and Millennium Actress (both 2001) for the most nominations for an anime film at the Annies (until it was surpassed by Hosoda's Belle (2021), with five nominations).",
                            "xinying", "Weathering With You1", "2022-09-11 10:20:08", 3322);
insert into reviews values ("t features the voices of Kotaro Daigo and Nana Mori, with animation direction by Atsushi Tamura, character design by Masayoshi Tanaka, and its orchestral score and soundtrack composed by Radwimps; the latter two previously collaborated with Shinkai on Your Name (2016).",
                            "fuguo", "Weathering With You1", "2022-10-03 19:50:45", 3320);

insert into currentuser values ("Null", "Null", "Null");

insert into movielist values ("Weathering With You1", "Animation", "Love", "Now Showing", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666713838627-f92eaa40b379?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 47876, "09 Nov 2022", "20.6");

insert into movielist values ("My Neighbor Totoro1", "romance", "Adventure, Fantasy, Family", "Coming Soon", "China", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 88989, "2020", "20.6");

insert into movielist values ("My Neighbor Totoro1", "romance", "Adventure, Fantasy, Family", "Now Showing", "Japan", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 88989, "08 Dec 2020", "20.6");

insert into movielist values ("My Neighbor Totoro1", "romance", "Adventure, Fantasy, Family", "Coming Soon", "us", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 88989, "2020", "20.6");

insert into movielist values ("My Neighbor Totoro1", "comedy", "Adventure, Fantasy, Family", "Coming Soon", "us", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 88989, "2019", "20.6");

insert into movielist values ("HAHA", "Animation", "Love", "Now Showing", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1659544623522-73ee0920af32?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDMzfGhtZW52UWhVbXhNfHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=800&q=60", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 22831, "02 Dec 2015", "20.6");

insert into movielist values ("Weathering With You2", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666792529510-9616222246d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 33128, "03 Oct 2008", "11.6");

insert into movielist values ("Weathering With You3", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666713838627-f92eaa40b379?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 47756, "09 Nov 2022", "20.6");

insert into movielist values ("My Neighbor Totoro4", "Animation", "Adventure, Fantasy, Family", "Now Showing", "Japan", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 88949, "08 Dec 2021", "20.6");

insert into movielist values ("HAHA2", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1659544623522-73ee0920af32?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDMzfGhtZW52UWhVbXhNfHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=800&q=60", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 22231, "02 Dec 2015", "8.6");

insert into movielist values ("Weathering With You5", "Animation", "Love", "Now Showing", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666792529510-9616222246d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 33812, "03 Oct 2008", "9.6");

insert into movielist values ("Weathering With You6", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666713838627-f92eaa40b379?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 14776, "09 Nov 2022", "10.6");

insert into movielist values ("My Neighbor Totoro3", "Animation", "Adventure, Fantasy, Family", "Coming Soon", "Japan", 
                            "86", "Hayao Miyazaki", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "My Neighbor Totoro (Japanese: となりのトトロ) is a 1988 Japanese animated fantasy film written and directed by Hayao Miyazaki and animated by Studio Ghibli for Tokuma Shoten. The film—which stars the voice actors Noriko Hidaka, Chika Sakamoto, and Hitoshi Takagi—tells the story of a professor's two young daughters (Satsuki and Mei) and their interactions with friendly wood spirits in postwar rural Japan.",
                            "https://images.unsplash.com/photo-1578888213392-88582bcfa6c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 88299, "08 Dec 2021", "8.6");

insert into movielist values ("HAHA3", "Animation", "Love", "Now Showing", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1659544623522-73ee0920af32?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDMzfGhtZW52UWhVbXhNfHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=800&q=60", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 22351, "02 Dec 2015", "9.6");

insert into movielist values ("Weathering With You7", "Animation", "Love", "Coming Soon", "Japan", 
                            "113", "Makoto Shinkai", "Hodaka Morishima, Hina Amano, Keisuke Suga", 
                            "193.8", "Weathering with You (Japanese: 天気の子) is a 2019 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy who runs away from his rural home to Tokyo and befriends an orphan girl who has the ability to control the weather. The film was commissioned in 2018, written and directed by Makoto Shinkai.",
                            "https://images.unsplash.com/photo-1666792529510-9616222246d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80", "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4", 33172, "03 Oct 2008", "10.6");

insert into theatres values ("Wanda Cinemas A", "Wanda Cinemas", "IMAX", "Tampines", "Ticket Changeable, Ticket Refundable", "Singapore, 634417", "66554433", "https://images.unsplash.com/photo-1478720568477-152d9b164e26?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "6km");
insert into theatres values ("Wanda Cinemas B", "Wanda Cinemas", "IMAX", "Woodlands", "Ticket Changeable, Ticket Refundable", "Singapore, 124456", "67895784", "https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "6km");
insert into theatres values ("Wanda Cinemas C", "Wanda Cinemas", "IMAX", "Jurong East", "Ticket Changeable, Ticket Refundable", "Singapore, 223333", "23462346", "https://images.unsplash.com/photo-1485095329183-d0797cdc5676?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "6km");
insert into theatres values ("Wanda Cinemas D", "Wanda Cinemas", "IMAX", "Jurong West", "Ticket Changeable, Ticket Refundable", "Singapore, 224679", "23463458", "https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "6km");
insert into theatres values ("Wanda Cinemas E", "Wanda Cinemas", "IMAX", "Sengkang", "Ticket Changeable, Ticket Refundable", "Singapore, 332679", "23573835", "https://images.unsplash.com/photo-1478720568477-152d9b164e26?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "6km");
insert into theatres values ("Wanda Cinemas F", "Wanda Cinemas", "IMAX", "Bedok", "Ticket Changeable, Ticket Refundable", "Singapore, 123579", "23452345", "https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "6km");
insert into theatres values ("Wanda Cinemas G", "Wanda Cinemas", "Dolby Cinema", "Bukit Merah", "Ticket Changeable, Ticket Refundable", "Singapore, 244689", "45685965", "https://images.unsplash.com/photo-1478720568477-152d9b164e26?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "8km");
insert into theatres values ("Wanda Cinemas H", "Wanda Cinemas", "Dolby Cinema", "Queenstown", "Ticket Changeable, Ticket Refundable", "Singapore, 222790", "45684684", "https://images.unsplash.com/photo-1485095329183-d0797cdc5676?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "9km");
insert into theatres values ("Wanda Cinemas I", "Wanda Cinemas", "Dolby Cinema", "Changi", "Ticket Changeable, Ticket Refundable", "Singapore, 689906", "36745678", "https://images.unsplash.com/photo-1485095329183-d0797cdc5676?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "10km");
insert into theatres values ("Wanda Cinemas J", "Wanda Cinemas", "Dolby Cinema", "Tampines", "Ticket Changeable, Ticket Refundable", "Singapore, 134267", "23463783", "https://images.unsplash.com/photo-1595769816263-9b910be24d5f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1479&q=80", "11km");
insert into theatres values ("Wanda Cinemas K", "Wanda Cinemas", "Dolby Cinema", "Tampines", "Ticket Changeable, Ticket Refundable", "Singapore, 699643", "45673545", "https://images.unsplash.com/photo-1485095329183-d0797cdc5676?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "12km");

insert into theatrelist values ("Wanda Cinemas A", "Wanda Cinemas", "IMAX", "Tampines", "Ticket Changeable, Ticket Refundable", "Singapore, 634417", "66554433", "https://images.unsplash.com/photo-1478720568477-152d9b164e26?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "6km");
insert into theatrelist values ("Wanda Cinemas B", "Wanda Cinemas", "IMAX", "Woodlands", "Ticket Changeable, Ticket Refundable", "Singapore, 124456", "67895784", "https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "6km");
insert into theatrelist values ("Wanda Cinemas C", "Wanda Cinemas", "IMAX", "Jurong East", "Ticket Changeable, Ticket Refundable", "Singapore, 223333", "23462346", "https://images.unsplash.com/photo-1485095329183-d0797cdc5676?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "6km");
insert into theatrelist values ("Wanda Cinemas D", "Wanda Cinemas", "IMAX", "Jurong West", "Ticket Changeable, Ticket Refundable", "Singapore, 224679", "23463458", "https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "6km");
insert into theatrelist values ("Wanda Cinemas E", "Wanda Cinemas", "IMAX", "Sengkang", "Ticket Changeable, Ticket Refundable", "Singapore, 332679", "23573835", "https://images.unsplash.com/photo-1478720568477-152d9b164e26?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "6km");
insert into theatrelist values ("Wanda Cinemas F", "Wanda Cinemas", "IMAX", "Bedok", "Ticket Changeable, Ticket Refundable", "Singapore, 123579", "23452345", "https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "6km");
insert into theatrelist values ("Wanda Cinemas G", "Wanda Cinemas", "Dolby Cinema", "Bukit Merah", "Ticket Changeable, Ticket Refundable", "Singapore, 244689", "45685965", "https://images.unsplash.com/photo-1478720568477-152d9b164e26?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "8km");
insert into theatrelist values ("Wanda Cinemas H", "Wanda Cinemas", "Dolby Cinema", "Queenstown", "Ticket Changeable, Ticket Refundable", "Singapore, 222790", "45684684", "https://images.unsplash.com/photo-1485095329183-d0797cdc5676?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "9km");
insert into theatrelist values ("Wanda Cinemas I", "Wanda Cinemas", "Dolby Cinema", "Changi", "Ticket Changeable, Ticket Refundable", "Singapore, 689906", "36745678", "https://images.unsplash.com/photo-1485095329183-d0797cdc5676?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "10km");
insert into theatrelist values ("Wanda Cinemas J", "Wanda Cinemas", "Dolby Cinema", "Tampines", "Ticket Changeable, Ticket Refundable", "Singapore, 134267", "23463783", "https://images.unsplash.com/photo-1595769816263-9b910be24d5f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1479&q=80", "11km");
insert into theatrelist values ("Wanda Cinemas K", "Wanda Cinemas", "Dolby Cinema", "Tampines", "Ticket Changeable, Ticket Refundable", "Singapore, 699643", "45673545", "https://images.unsplash.com/photo-1485095329183-d0797cdc5676?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80", "12km");