package request

// Register struct.
type Register struct {
	Username    string `json:"userName"`
	Password    string `json:"passWord"`
	NickName    string `json:"nickName" gorm:"default:'QMPlusUser'"`
	HeaderImg   string `json:"headerImg" gorm:"default:'http://example.com/avatar/test.jpg'"`
	AuthorityID string `json:"authorityId" gorm:"default:888"`
}

// Login struct.
type Login struct {
	Username  string `json:"username"`
	Password  string `json:"password"`
	Captcha   string `json:"captcha"`
	CaptchaID string `json:"captchaId"`
}
