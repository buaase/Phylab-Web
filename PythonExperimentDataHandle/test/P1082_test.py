import P1082
import unittest 

class test_phylab(unittest.TestCase):
    def testBiprismSodium_1(self):
        lx = [8.172,7.853,7.538,7.176,6.831,6.508,6.198,5.891,5.464,5.147,
                4.848,4.559,4.275,3.902,3.563,3.255,2.971,2.615,2.310,1.995]
        bmin = [6.001,5.222,5.925,5.171]
        bmax = [6.757,2.710,6.678,2.628]
        loc = [144.0,52.0,128.0,113.8,77.9]
        res = P1082.BiprismSodium(lx,bmin,bmax,loc)
        self.assertEqual(res,"(5.9\\pm0.1){\\times}10^{2}","test BiprismSodium_1 fail")

    def testLloydSodium_1(self):
        lx = [9.547,9.218,8.827,8.167,7.851,7.562,7.257,6.928,6.622,8.485,
              6.334,6.010,5.768,5.001,4.710,4.399,4.097,3.800,3.484,5.341]
        bmin = [5.674,4.879,5.558,4.807]
        bmax = [6.807,3.679,6.714,3.521]
        loc = [144.0,58.0,132.0,118.2,85.4]
        res = P1082.LloydSodium(lx,bmin,bmax,loc)
        self.assertEqual(res,"(5.8\\pm0.1){\\times}10^{2}","test LloydSodium_1 fail")

if __name__ =='__main__':
	unittest.main()
