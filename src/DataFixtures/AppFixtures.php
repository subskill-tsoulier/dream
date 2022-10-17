<?php


namespace App\DataFixtures;

use App\Entity\Job;
use App\Entity\Img;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");

        for ($i = 0; $i < 3600; $i++) {
            $pro = ["Développeur Front", "Développeur Back","Développeur Full Stack",  "DevOps", "Ingénieur", "SysAdmin"];
            $profession = $pro[array_rand($pro, 1)];

            $cont = ["CDI", "Alternance", "CDD", "Stage", "Intérim", "Freelance"];
            $contract = $cont[array_rand($cont, 1)];

            $com = ["Meta", "Subskill", "AWS", "Apple", "Thales", "Capgemini", "Festina"];
            $company = $com[array_rand($com, 1)];

            $ville = ["Paris", "Marseille", "Lyon", "New York", "Los Angeles", "Rome", "Palerme", "Londer", "Tokyo"];
            $city = $ville[array_rand($ville, 1)];

            $url = ["https://purr.objects-us-east-1.dream.io/i/E61tK.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/cutekittylaxing.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/img-20170929-wa0005.jpeg", 
            "https://purr.objects-us-east-1.dream.io/i/lAs9D.gif", 
            "https://purr.objects-us-east-1.dream.io/i/20170219_154626.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/ginger1.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/20170304_091047-1.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/20160824_163837-1.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/11226561_939465719444268_5011472048854498701_n.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/Krg7R.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/050_-_tFaTOkv.gif", 
            "https://purr.objects-us-east-1.dream.io/i/cutiesimon.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/Z2nRg.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/hWdx5.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/8y8qbgY.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/r122.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/VOCpm.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/EJmsm.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/1uhkzdY.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/20171109_194252.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/tLkmF.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/g0yMj.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/hVU2I6L.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/mDh7a.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/s6LNd.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/030_-_VNZ6Gt8.gif", 
            "https://purr.objects-us-east-1.dream.io/i/20160628_130711.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/20170401_220921.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/aGXtQ.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/y2AKC.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/AwLr7.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/photo_chat.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/BaO8d.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/nZClrBH.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/image1-3.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/20171129_203407.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/biE6r.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/GPoNS.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/yfh9V.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/FdQoa.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/20160824_163837-1.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/20170523_201007.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/Geqgs.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/oaL2N.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/afbeelding173.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/20160826_195612.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/10157409_690859040971605_75316592_n.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/003_-_Zwauibq.gif", 
            "https://purr.objects-us-east-1.dream.io/i/img_0023.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/960033_717282513470_976736117_n.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/10624755_823354494388725_2539116401027301765_n.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/AwLr7.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/20160824_163745.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/xCCsf0k.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/rq24W.png", 
            "https://purr.objects-us-east-1.dream.io/i/cam00531.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/zSpFr.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/vKNYB.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/1379531_717282533430_1905560887_n.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/NWody.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/image1-4.jpeg", 
            "https://purr.objects-us-east-1.dream.io/i/whVjW.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/041_-_ylxLqGr.gif", 
            "https://purr.objects-us-east-1.dream.io/i/X3P6l.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/3DqhJ.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/1246134916.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/xrM9q.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/iqROl.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/w5oHdyb.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/0JEgI.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/img_20171005_180555.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/tumblr_luhf8e8rwh1qaoexto1_1280.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/party.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/20171128_175324.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/cutetan.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/hVU2I6L.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/2qMLS.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/20171128_175236.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/cat1-1.png", 
            "https://purr.objects-us-east-1.dream.io/i/1291797107e1upuQW.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/r125.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/montytreats.jpeg", 
            "https://purr.objects-us-east-1.dream.io/i/AqyNm.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/3lReE.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/5w94q.png", 
            "https://purr.objects-us-east-1.dream.io/i/3eK4i.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/kINjYRu.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/img_0023.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/QRp74.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/bjo7C.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/img_0035.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/h8cHb.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/599806_717282767960_328803477_n.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/GLDTyUW.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/20170217_171853.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/img_20150409_202617.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/N7ZuL.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/img_0213.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/image323.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/bqzJ9.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/022_-_GovPoMj.gif", 
            "https://purr.objects-us-east-1.dream.io/i/y2np3.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/S4HBG.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/20170313_220235-1.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/O5wj5.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/dhdJ5.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/felix.png", 
            "https://purr.objects-us-east-1.dream.io/i/woodserwalk.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/22812682_1520180634716543_581401988_o.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/scottishfold.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/Lpmgh.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/sm0l.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/70y8a.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/biE6r.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/img_6184.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/bQi00.gif", 
            "https://purr.objects-us-east-1.dream.io/i/eUKZl.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/poppy.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/black-cats-pictures-12.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/lbXht.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/TsCz0.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/ZicFu.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/img_20160817_221722.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/r8jad.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/spike.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/uUi0a.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/703eJ.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/404cat.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/mumford.png", 
            "https://purr.objects-us-east-1.dream.io/i/dmzl0lnr184ntq3llboryj9.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/bjo7C.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/fIzFU.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/img_0031.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/img_1844.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/3gKZQ.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/montyjungle.jpeg", 
            "https://purr.objects-us-east-1.dream.io/i/0oKOv.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/09RGPPK.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/image.jpeg", 
            "https://purr.objects-us-east-1.dream.io/i/gacSx.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/VjIboF2.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/2016-09-0923.16.24.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/20180130_165341-1.jpg",  
            "https://purr.objects-us-east-1.dream.io/i/tumblr_lnhcqaw1ha1ql93lco1_500.jpg"];

            $link = $url[array_rand($url, 1)];

            $job = new Job();
            $job->setTitle($faker->words(3, true));
            $job->setDescription($faker->text(150));
            $job->setProfession($profession);
            $job->setContract($contract);
            $job->setCountry('France');
            $job->setCity($city);
            $job->setZipCode($faker->numberBetween(1000, 98000));
            $job->setCompany($company);
            $job->setSalary($faker->numberBetween(35000, 120000));
            $job->setRef($faker->uuid());
            $job->setUpdatedTime($faker->numberBetween(1665743488, 1666952869));
            $job->setCreatedAt($faker->numberBetween(1664533669, 1665743488));
            $job->setUrlImg($link);
            $manager->persist($job);
        }
        $manager->flush();

        
    }
}