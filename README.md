# Allana-Act8API

hello mamsh, goods na yung get and post

C# :
yung sa post kaso, may 2 options ka dun kung pano
it's either may await FetchDeptAndSalary(); sa FetchDeptAndSalary na class or wala 

pag meron: 
ma mamake sure niya na mareretrive talaga yung tamang salary, kaso minsan matagal makuha, lalo na kung mabilis magpindot pindot sa radio buttons
depends actually, minsan matagal minsan mabilis
tas may lag time na onti pag naga post tas get, pero slight lang naman
kung maga switch switch ka ng radio buttons para mapakita na naga change siya real time, mas okay to para sure na tama yung salary 

pag wala:
mabilis yung pag get and post
may chance na di makuha yung tamang value unless mag pindot ka ulit ng radio button, pero sometimes maayos naman siya
mabilis makuha yung value, pero may chances na mali kaya need mag double check
kung hindi ka naman maga switch switch ng radio buttons sa demo vid, mas better to gamitin

tapos pala, instead na yung "Tech Support" etc yung mapapass na value sa deptOption, int na siya ngayon, which is yung 1,3,5
since number/int dapat ang masstore sa db
yan yung error kanina sa api, int values lang pwede since yun ang format ni dept_id and sal_id sa db

ayy kaya ata pala di gumagana yung Tech Support nung tig try mo kasi yung nasa db is TechSupport, walang space

api.php : 
bale may changes sa get request, eto yung naging reason (ata) kung bakit bumagal yung retrieval sa salary (huhu sori)
yung get request na involved yung department tas deptsal, iisa nalang siya, since sabay naman yung pag output niya and same lang ang reference number (dnumber)
ganito rin kasi yung sa code ko kaya dito ako mas mafamiliar, di ko masyadong naaral yung kay mami

hmm di ko sure if may naleft out ako ehe anw may vid naman ako na sinend sa gc para makita mo
tas if ever may error or something and tulog pako HAHAHAHA ask mo nalang si bibyan

goodluck mamsh <33 
- ninang
