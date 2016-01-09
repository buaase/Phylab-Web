import P1061
import phylab
import unittest 

class test_phylab(unittest.TestCase):
        def test1(self):
                exper_1 = [[1400.0,469.2,1011.5,1014.8],[1400,492.3,1001.8,1004.6],[1400.0,426.1,1040.3,1037.8]]
                exper_2 = [[1400.0,507.1,934.1,936.9],[1400.0,531.2,947.8,947.6],[1400.0,539.8,952.9,954.1]]
                exper_3 = [[1400.0,410.5,716.9,715.4],[1400.0,397.1,712.8,711.0],[1400.0,370.4,674.9,672.6]]
                res = P1061.ObjectImageConvex(exper_1, exper_2, exper_3)
                res = phylab.Mistake(res,210.76)
                self.assertEqual(res,1,"test 10611 fail")
        def test2(self):
                exper = [[949.1,990.3,988.8,808.1],[950.8,989.9,986.2,841.7],[949.8,987.1,987.9,834.5]]
                res = P1061.ObjectImageConcave(exper)
                res = phylab.Mistake(res,-50.68)
                self.assertEqual(res,1,"test 10612 fail")
        def test3(self):
                exper = [[1400,1315.2,1311.9],[1300.0,1213.9,1209.9],[1200.0,1116.1,1118.3],[1100.0,1014.8,1013.9],[1000.0,916.7,918.2]]
                res = P1061.CollimatedConvex(exper)
                t = 1
                if (abs(res[0]-50) >= 0.5) | (abs(res[1]-1) >= 0.5):
                        t = 0
                self.assertEqual(t,1,"test 10613 fail")

if __name__ =='__main__':
	unittest.main()


