<?php
require 'forms/header.php';
?>
            <section>
                <div class="reg">
                    <div class="ContentSection">
                        <form method="post" action="methods/reg.php" class="Content">
                            <h3>ФИО</h3>
                            <input type="text" required name="name" id="name">
                            <h3>Почта mail</h3>
                            <input type="text" required name="email" id="email" style="<?php
                                   if ($_COOKIE['warEmail']==1)
                                   { echo 'border: 1px solid #ff0d1e'; }
                                   ?>">
                            <h3>Номер телефона</h3>
                            <input type="log" required name="phone" id="phone" style="<?php
                                   if ($_COOKIE['warPhone']==1)
                                   { echo 'border: 1px solid #ff0d1e'; }
                                   ?>">
                            <h3>Город проживания</h3>
                            <input type="text" required name="city" id="city">
                            <h3>Пароль</h3>
                            <div>( Пароль дожен содержать цифры,<br>
                                заглавные и прописные буквы [A-z] <br>
                                и быть не менее 8 символов. )</div>
                            <input type="password" required name="pass" id="pass" style="<?php
                                   if ($_COOKIE['warPass']==1)
                                   { echo 'border: 1px solid #ff0d1e'; }
                                   ?>">
                            <h3>Повторите пароль</h3>
                            <input type="password" required name="pass1" style="<?php
                                                                   if ($_COOKIE['warPass1']==1)
                                                                   { echo 'border: 1px solid #ff0d1e'; }
                                                                   ?>">
                            <input type="submit" name="Ok" value="Получить код" class="button7"></input>
                        </form>
                        <form method="post" action="methods/sendСode.php" class="Content">
                            <h3>Введите код</h3>
                            <div>( Код отправляется на указанный<br> вами почтовый адрес. )</div>
                            <input type="text" name="kod" required style="<?php
                            if ($_COOKIE['warCode']==1)
                            { echo 'border: 1px solid #ff0d1e'; }
                            ?>">
                            <input type="submit" name="UpKod" value="ОК" class="button7"></input>
                        </form>
                    </div>
                </div>
            </section>
<script type='text/javascript'>
    $("#name").attr("value", '<?php echo $_COOKIE['name'];?>');
    $("#email").attr("value", '<?php echo $_COOKIE['email']?>');
    $("#phone").attr("value", '<?php echo $_COOKIE['phone']?>');
    $("#city").attr("value", '<?php echo $_COOKIE['city']?>');
    $("#pass").attr("value", '<?php echo $_COOKIE['pass']?>');
</script>
<?php
require 'forms/footer.php';
?>




<!--/*CREATE TABLE users
(
id_users serial NOT NULL,
email_users character varying(150),
name_users character varying(250),
adres_users character varying(300),
photo_users character varying(500),
password_users character varying(25),
number_phone character varying(25),
CONSTRAINT pk_users PRIMARY KEY (id_users)
)
WITH (
OIDS=FALSE
);
ALTER TABLE users
OWNER TO postgres;
GRANT ALL ON TABLE users TO postgres;
GRANT SELECT, INSERT ON TABLE users TO "User";

-- Index: users_pk

-- DROP INDEX users_pk;

CREATE UNIQUE INDEX users_pk
ON users
USING btree
(id_users);













CREATE TABLE posters
(
title_posters character varying(200),
text_posters text,
id_posters serial NOT NULL,
id_users integer NOT NULL,
data_posters character varying(200),
CONSTRAINT pk_posters PRIMARY KEY (id_posters),
CONSTRAINT fk_posters_relations_users FOREIGN KEY (id_users)
REFERENCES users (id_users) MATCH SIMPLE
ON UPDATE RESTRICT ON DELETE RESTRICT
)
WITH (
OIDS=FALSE
);
ALTER TABLE posters
OWNER TO postgres;
GRANT ALL ON TABLE posters TO postgres;
GRANT SELECT, INSERT ON TABLE posters TO "User";

-- Index: posters_pk

-- DROP INDEX posters_pk;

CREATE UNIQUE INDEX posters_pk
ON posters
USING btree
(id_posters);

-- Index: relationship_2_fk

-- DROP INDEX relationship_2_fk;

CREATE INDEX relationship_2_fk
ON posters
USING btree
(id_users);






CREATE TABLE file_posters
(
filename_posters character varying(500),
id_file_posters integer NOT NULL,
id_posters integer NOT NULL,
CONSTRAINT pk_file_posters PRIMARY KEY (id_file_posters),
CONSTRAINT fk_file_pos_relations_posters FOREIGN KEY (id_posters)
REFERENCES posters (id_posters) MATCH SIMPLE
ON UPDATE RESTRICT ON DELETE RESTRICT
)
WITH (
OIDS=FALSE
);
ALTER TABLE file_posters
OWNER TO postgres;
GRANT ALL ON TABLE file_posters TO postgres;
GRANT SELECT, INSERT ON TABLE file_posters TO "User";

-- Index: file_posters_pk

-- DROP INDEX file_posters_pk;

CREATE UNIQUE INDEX file_posters_pk
ON file_posters
USING btree
(id_file_posters);

-- Index: relationship_1_fk

-- DROP INDEX relationship_1_fk;

CREATE INDEX relationship_1_fk
ON file_posters
USING btree
(id_posters);*/-->
